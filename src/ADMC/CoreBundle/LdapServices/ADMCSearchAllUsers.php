<?php


namespace ADMC\CoreBundle\LdapServices;
use ADMC\CoreBundle\LdapServices\ADMCConnector;


class ADMCSearchAllUsers{
    
    private $connect;
    
    public function __construct(ADMCConnector $connector){
        $this->connect = $connector;
    }
    
    public function searchUser(){
        
        $this->connect->connector();
        $group = "*";
        $ds = $this->connect->getConnector();
        $racine =  "cn=Users,dc=admc, dc=com";
        $rechercheGroupe = ldap_search($ds, $racine, "(&(objectclass=user)(name=".$group."))");
        $entries = ldap_get_entries($ds, $rechercheGroupe);
       //var_dump($entries);
        for ($x=0; $x<$entries['count']; $x++){
            if (!empty($entries[$x]['givenname'][0]) &&
                 !empty($entries[$x]['mail'][0]) &&
                 !empty($entries[$x]['samaccountname'][0]) &&
                 !empty($entries[$x]['userpassword'][0]) ){
                $ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))] = array('email' => strtolower(trim($entries[$x]['mail'][0])),'first_name' => trim($entries[$x]['givenname'][0]),'last_name' => trim($entries[$x]['sn'][0]),'password' => trim(substr($entries[$x]['userpassword'][0], 5, strlen($entries[$x]['userpassword'][0])-1         )));
            }
        }
        //var_dump($ad_users);
        return $ad_users;
        
        
   }
 
    
}