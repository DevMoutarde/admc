<?php


namespace ADMC\CoreBundle\LdapServices;
use \ADMC\CoreBundle\LdapServices\ADMCConnector;


class ADMCDelUserFromGroup{
    
    private $connector;
    
    public function __construct(ADMCConnector $connector) {
        $this->connector = $connector;
    }
    
 public function delUserFromGroup($group, $user){
     
     $this->connector->connector();
     $ds = $this->connector->getConnector();
     $racine =  "dc=admc, dc=com";
     $rechercheGroupe = ldap_search($ds, $racine, "(&(objectclass=group)(name=".$group."))");
     $resultatGroupe = ldap_get_entries($ds, $rechercheGroupe);
     //var_dump($resultatGroupe);
     $groupe = $resultatGroupe[0];
     //var_dump($groupe);
     $dn_group = $groupe['dn'];
     $userToDel['member']="cn=".$user.",cn=Users,dc=admc,dc=com";
     
     ldap_mod_del($this->connector->getConnector(), $dn_group, $userToDel);
     
 }
    
}
    