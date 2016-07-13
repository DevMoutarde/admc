<?php


namespace ADMC\CoreBundle\LdapServices;
use \ADMC\CoreBundle\LdapServices\ADMCConnector;

/**
 * Classe ADMCDelUserFromGroup
 * Supprime un utilisateur d'un groupe
 */
class ADMCDelUserFromGroup{
    
    private $connector;
    
    
    /**
     * @param ADMCConnector $connector
     */
    public function __construct(ADMCConnector $connector) {
        $this->connector = $connector;
    }
    
    /**
     * Supprime l'utilisateur du groupe $group
     * @param str $group
     * @param str $user
     */
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
    