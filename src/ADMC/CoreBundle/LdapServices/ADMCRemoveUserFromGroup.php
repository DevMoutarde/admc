<?php



namespace ADMC\CoreBundle\LdapServices;
use \ADMC\CoreBundle\LdapServices\ADMCConnector;
use \ADMC\CoreBundle\LdapServices\ADMCIsInGroup;

/**
 * Classe ADMCRemoveUserFromgroup
 * Ajoute un utilisateur dans un groupe
 */
class ADMCRemoveUserFromGroup{
    
    private $connector;
    private $isInGroup;
    
    
    /**
     * 
     * @param ADMCConnector $connector
     * @param ADMCIsInGroup $isInGroup
     */
    public function __construct(ADMCConnector $connector, ADMCIsInGroup $isInGroup) {
        $this->connector = $connector;
        $this->isInGroup = $isInGroup;
    }
    
    
    public function removeUserFromGroup($user, $group){
        
        if ($this->isInGroup->isInGroup($group->getName(), $user->getUsername())){
            
            $this->connector->connector();
            $ds = $this->connector->getConnector();
            $racine =  "dc=admc, dc=com";
            $rechercheGroupe = ldap_search($ds, $racine, "(&(objectclass=group)(name=".$group."))");
            $resultatGroupe = ldap_get_entries($ds, $rechercheGroupe);
            //var_dump($resultatGroupe);
            $groupe = $resultatGroupe[0];
            //var_dump($groupe);
            $dn_group = $groupe['dn'];
            $recupMember = $groupe["member"];

                $groupe = array();
                $groupe['member']="cn=".$user.",cn=Users,dc=admc,dc=com";

            return  ldap_mod_del($this->connector->getConnector(), $dn_group, $groupe) or die ();

        }else{
            return False;
        }
    }
    
    
}