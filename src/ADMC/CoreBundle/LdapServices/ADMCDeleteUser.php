<?php

namespace ADMC\CoreBundle\LdapServices;
use FOS\UserBundle\Doctrine\UserManager;
use ADMC\CoreBundle\LdapServices\ADMCConnector;
use ADMC\CoreBundle\Entity\User;

/**
 * @class ADMCDeleteUser
 * 
 */

/**
 * Permet la suppression d'un utilisateur sur l'AD ainsi 
 * que la désactivation de ce dernier en base de données
 */
class ADMCDeleteUser{
    
    private $userManager;
    private $connector;
    
    public function __construct(ADMCConnector $connect, UserManager $userManager){
        
        $this->userManager = $userManager;
        $this->connector = $connect;
    }
    
    /**
     * permet la suppression d'un utilisateur sur l'AD
     * ainsi que sa désactivation en base de données
     * @param User  $user  L'utilisateur à supprimer
     * @return Boolean  Indique si la tache est accomplie ou non
     * @author Fourcault Gabin
     */
    public function deleteUser(User $user){
        
        $user->setEnabled(False);
        
        //recherche de l'utilisateur dans l'AD
        $this->connector->connector();
        $ad = $this->connector->getConnector();
        $racine =  "cn=Users,dc=admc, dc=com";
        $rechercheGroupe = ldap_search($ad, $racine, "(&(objectclass=user)(name=".$user->getLastName()."))");
        $entries = ldap_get_entries($ad, $rechercheGroupe);
        
        if ($entries['count']>=1){
            
            $this->userManager->updateUser($user);
            //var_dump($entries[0]['distinguishedname'][0]);
            return ldap_delete($ad, $entries[0]['distinguishedname'][0]);
        }else{
            return False;
            
            
        }
        
    }
    

    
}