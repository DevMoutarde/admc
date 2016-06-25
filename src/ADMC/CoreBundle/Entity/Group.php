<?php

namespace ADMC\CoreBundle\Entity; 
use FOS\UserBundle\Model\Group as BaseGroup; 
use Doctrine\ORM\Mapping as ORM; 

/** 
* @ORM\Entity 
* @ORM\Table(name="fos_group") 
* 
*/ 

class Group extends BaseGroup { 
    /** 
    * @ORM\Id  
    * @ORM\Column(type="integer") 
    * @ORM\GeneratedValue(strategy="AUTO") 
    */
    protected $id; 
    
    /**  
    * @ORM\ManyToMany(targetEntity="ADMC\CoreBundle\Entity\User", mappedBy="groups")  
    */ 
    protected $users;
     
    public function __construct($name = '', $roles = array()) {
        
         $this->name = $name;
         $this->roles = $roles;
    }
 
    public function __toString() {
        return $this->getName();
    }
 
    function getUsers() {
        return $this->users;
    }
    
    
    
    
        /**
     * Add user
     *
     * @param \ADMC\CoreBundle\Entity\FosUser $user
     *
     * @return Group
     */
    public function addUser(\ADMC\CoreBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \ADMC\CoreBundle\Entity\FosUser $user
     */
    public function removeUser(\ADMC\CoreBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }
 
}