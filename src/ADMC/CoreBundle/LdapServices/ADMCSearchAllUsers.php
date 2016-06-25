<?php


namespace ADMC\CoreBundle\LdapServices;
use ADMC\CoreBundle\LdapServices\ADMCConnector;


class ADMCSearchAllUsers{
    
    private $connect;
    
    public function __construct(ADMCConnector $connector){
        $this->connect = $connector;
    }
    
    public function searchUser($name = null){
        
        $this->connect->connector();
        if ($name != null){
            $group = $name;
        }else{
            $group = "*";
        }
        
        $ds = $this->connect->getConnector();
        $racine =  "cn=Users,dc=admc, dc=com";
        $rechercheGroupe = ldap_search($ds, $racine, "(&(objectclass=user)(name=".$group."))");
        $entries = ldap_get_entries($ds, $rechercheGroupe);
       //var_dump($entries);
        for ($x=0; $x<$entries['count']; $x++){
            if (
                 !empty($entries[$x]['name'][0])&&
                 !empty($entries[$x]['givenname'][0]) &&
                 !empty($entries[$x]['mail'][0]) &&
                 !empty($entries[$x]['samaccountname'][0]) 
                 //!empty($entries[$x]['userpassword'][0])  
                 ){
                $ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))] = array(
                    'logon' =>trim(($entries[$x]['name'][0])),
                    'email' => strtolower(trim($entries[$x]['mail'][0])),
                    'first_name' => trim($entries[$x]['givenname'][0]),
                    'last_name' => trim($entries[$x]['sn'][0]),
                    'password' => trim(base64_encode( pack( 'H*' , md5('Donjon2016') ) )) );
                   if(!empty($entries[$x]['memberof'][0])){
                       //var_dump($entries[$x]['memberof']);
                       for($y=0; $y< $entries[$x]['memberof']['count']; $y++){
                           
                           if($this->startsWith($this->getBetween($entries[$x]['memberof'][$y], "=", ","), "ROLE")){
                               echo "role trouvé";
                           }
                           $ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))]['memberof'][$y] = $this->getBetween($entries[$x]['memberof'][$y], "=", ",");
                       }
                       
                   }
                   if(!empty($entries[$x]['streetaddress'][0])){
                       $ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))]['streetaddress'] = $entries[$x]['streetaddress'][0];
                   }
                   if(!empty($entries[$x]['postalcode'][0])){
                       $ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))]['postalcode'] = $entries[$x]['postalcode'][0];
                   }
                   if(!empty($entries[$x]['l'][0])){
                       $ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))]['town'] = $entries[$x]['l'][0];
                   }
                   if(!empty($entries[$x]['postalcode'][0])){
                       $ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))]['postalcode'] = $entries[$x]['postalcode'][0];
                   }

            }
        }
        //var_dump($ad_users);
        return $ad_users;
        
        
   }
   
   public function getBetween($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}

function startsWith($haystack, $needle) {
    
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}
 
    
}