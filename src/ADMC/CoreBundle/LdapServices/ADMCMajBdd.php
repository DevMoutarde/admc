<?php

namespace ADMC\CoreBundle\LdapServices;
use \Doctrine\ORM\EntityManager;
use \ADMC\CoreBundle\LdapServices\ADMCSearchAllUsers;
use FOS\UserBundle\Doctrine\UserManager;
use FOS\UserBundle\Doctrine\GroupManager;


class ADMCMajBdd {
    
    private $connect;
    private $em;
    private $users;
    private $userManager;
    private $groupManager;
    
    public function __construct(ADMCConnector $connector, EntityManager $entityManager, ADMCSearchAllUsers $users, UserManager $userManager, GroupManager $groupManager){
        $this->connect = $connector;
        $this->em = $entityManager;
        $this->users = $users;
        $this->userManager = $userManager;
        $this->groupManager = $groupManager;
    }
    
    public function updateBdd(){
        
       
        
       $users = $this->users->searchUser();
        foreach ($users as $user){
            $result =  $this->userManager->findUserByUsername($user['logon']);
            //var_dump($user);
            
            //create group if not exist
            $this->groupChecker($user);
            
            
            if ($result === null){
                //if user unknown
                $userCreate = $this->userManager->createUser();
                $userCreate->setUsername($user['logon']);
                $userCreate->setUsernameCanonical($user['logon']);
                $userCreate->setEmail($user['email']);
                $userCreate->setPassword($user['password']);
                $userCreate->setEnabled(true);
                $userCreate->setFirstName($user['first_name']);
                $userCreate->setLastName($user['last_name']);
                //add group if starts with "ROLE"
                $this->addRole($userCreate, $user);
                
                if(isset($user['streetaddress'])){
                    $userCreate->setAddress($user['streetaddress']);
                }
                if(isset($user['town'])){
                    $userCreate->setTown($user['town']);
                }
                if(isset($user['postalcode'])){
                    $userCreate->setPostalCode($user['postalcode']);
                }
                
                
                
                

                $this->userManager->updateUser($userCreate);
            
            //if user is known  
            }else{
                
                //add roles
                $this->addRole($result, $user);
                $this->removeRole($result, $user);
                //update the password in DB if not similar
                $this->checkPassword($result->getPassword(), $user['password'], $result);
                //manage group, if exists - update, if not - create one 
                
                //add group to user if necessary
                if(isset($user['memberof'])){
                    $this->addUserToGroup($result, $user['memberof']);
                }
                
                $this->userManager->updateUser($result);

                  
            }
        }
       
        
    }
    
    public function removeRole(\ADMC\CoreBundle\Entity\User $userBdd, $userLdap){
        
       $userBdd->getRoles();
       foreach ($userBdd->getRoles() as $roleBdd){
           if(isset($userLdap['memberof'])){
               
                if(!in_array($roleBdd, $userLdap['memberof'])){
                    $userBdd->removeRole($roleBdd);
                }
               
           }
       }
        
    }
    
    
    public function checkPassword($bddPass, $ldapPass, $user){
        
        if($bddPass != $ldapPass){
            $user->setPassword($ldapPass);
        }
    }
    
    
    public function addRole($user, $data){
        if(isset($data['memberof'])){
            //if start with ROLE
            foreach ($data['memberof'] as $group){
                if($this->startsWith($group, 'ROLE')){
                    $user->addRole($group);
                      
                   }
            }
        }
    }

    public function groupChecker($data=null){
       
        if(isset($data['memberof'])){
            //if start with ROLE
            foreach ($data['memberof'] as $groupName){
                if(!$this->startsWith($groupName, 'ROLE')){
                   // echo "<br> verification existence groupe ".$groupName;
                    //find the group
                   $group= $this->groupManager->findGroupByName($groupName);
                   //if group does not exists
                    if($group === null){
                       // echo "<br> le groupe n'existe pas";
                        $group = $this->groupManager->createGroup($groupName);
                        $this->groupManager->updateGroup($group, True);
                    }
                      
                   }
            }
        }
        
    }
    
    /*
     * var $group array of string from ldap
     * var $user Entity\User 
     */
    public function addUserToGroup( $user, $group){
        
        
        foreach($group as $grp){
            $groupBdd = $this->groupManager->findGroupByName($grp);
            
            if($groupBdd !==null){
                
                $user->addGroup($groupBdd);
            }
        }
        $this->removeUserToGroup($user, $group);
    }
    
    
     /*
     * var $group array of string from ldap
     * var $user Entity\User
     */
    public function removeUserToGroup($user,$group){
        //if(!in_array($roleBdd, $userLdap['memberof']))
        
        
        
        
        foreach($group as $groupNameLdap){
//            if(! $this->startsWith($groupNameLdap, "ROLE")){
//                //echo "<br> utilisateur ".$user->getUsername()." a le groupe ".$groupNameLdap;
//                if(!in_array($groupNameLdap, $groupNameUser)){
//                    
//                }
//                
//            }
            
            
        }
        foreach($user->getGroupNames() as $groupNameUser){
            if(!in_array($groupNameUser, $group)){
                echo "<br> utilisateur ".$user->getUsername()." n'est pas cencé avoir le groupe ".$groupNameUser;
                $groupASuppr = $this->groupManager->findGroupByName($groupNameUser);
                $user->removeGroup($groupASuppr);
                
            }
        }
        
        
        
    }
        
    
    
    
    
    
    public function startsWith($haystack, $needle) {
    
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}
    
    
    public function listGroup($user){
        if(isset($user['memberof'])){
                foreach ($user['memberof'] as $group){
                   echo " ".$group." ";
                }
            }
    }
}