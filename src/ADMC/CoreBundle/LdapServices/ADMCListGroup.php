<?php

namespace ADMC\CoreBundle\LdapServices;
use ADMC\CoreBundle\LdapServices\ADMCConnector;


class ADMCListGroup{
    
    
    private $connector;
    public function __construct(ADMCConnector $connector) {
        
        $this->connector = $connector;
    }
    
    public function listGroup(){
        
        $this->connector->connector();
        $ad = $this->connector->getConnector();
        $finalResult = Array();
        
        $racine =  "cn=Users,dc=admc, dc=com";
        $rechercheGroupe = ldap_search($ad, $racine, "(&(objectclass=group))");
        $entries = ldap_get_entries($ad, $rechercheGroupe);
        $listGroup = False;
        
        for($x=0; $x < $entries['count']; $x++){
            //var_dump($entries[$x]['cn'][0]);
            array_push($finalResult, $entries[$x]['cn'][0]);
        }
        
        
        return $finalResult;
        }
     
        
        
//        $this->connector->connector();
//        $result=ldap_list($this->connector->getConnector(), $ldap_dn, $filter, $justthese) or die("No search data found."); 
//
//        $info = ldap_get_entries($this->connector->getConnector(), $result);
//
//        for ($i=0; $i < $info["count"]; $i++) {
//            echo $info[$i]["cn"][0] . '<br />';
//        }
    
}