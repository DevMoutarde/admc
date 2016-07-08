<?php




namespace ADMC\CoreBundle\LdapServices;
use ADMC\CoreBundle\LdapServices\ADMCConnector;


class ADMCListGroupByUser{
    
    private $connect;
    
    public function __construct(ADMCConnector $connector){
        $this->connect = $connector;
    }
    

    public function listGroupByUser($name){
        
        $this->connect->connector();
        $ad = $this->connect->getConnector();
        
        
        $racine =  "cn=Users,dc=admc, dc=com";
        $rechercheGroupe = ldap_search($ad, $racine, "(&(objectclass=user)(name=".$name."))");
        $entries = ldap_get_entries($ad, $rechercheGroupe);
        $listGroup = False;
        
        for ($x=0; $x<$entries['count']; $x++){
            
        if(!empty($entries[$x]['memberof'][0])){
                   //var_dump($entries[$x]['memberof']);
                   for($y=0; $y< $entries[$x]['memberof']['count']; $y++){


                       $listGroup[$y] = $this->getBetween($entries[$x]['memberof'][$y], "=", ",");
                   }

               }
        }
        return $listGroup;
        
        
    }
    
    
   public function getBetween($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}
        
    }
 