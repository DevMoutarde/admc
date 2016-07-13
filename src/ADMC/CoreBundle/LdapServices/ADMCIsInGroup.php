<?php

namespace ADMC\CoreBundle\LdapServices;

use ADMC\CoreBundle\LdapServices\ADMCListUserByGroup;


/**
 * Classe ADMCIsInGroup
 * vérifie qu'un utilisateur est dans un groupe
 */
class ADMCIsInGroup{
    

    private $listUserByGroup;
    
    /**
     * @param ADMCListUserByGroup $listUserByGroup
     */
    public function __construct(ADMCListUserByGroup $listUserByGroup) {
        
        $this->listUserByGroup = $listUserByGroup;
    }
    
    
    /**
     * Renvoie True ou False en fonction de la présence constatée d'un utilisateur
     * @param string $group
     * @param string $userName
     * @return boolean
     */
    public function isInGroup($group, $userName){
        $trouve = false;
        $listUser = $this->listUserByGroup->listUserByGroup($group);
        
        

        foreach ($listUser as $user){
            if ($user == $userName){
                return True;
            }
            
        }
        return $trouve;

    }

}