<?php

namespace ADMC\CoreBundle\LdapServices;

use ADMC\CoreBundle\LdapServices\ADMCListUserByGroup;

class ADMCIsInGroup{
    

    private $listUserByGroup;
    
    public function __construct(ADMCListUserByGroup $listUserByGroup) {
        
        $this->listUserByGroup = $listUserByGroup;
    }
    
    
    /**
     * 
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