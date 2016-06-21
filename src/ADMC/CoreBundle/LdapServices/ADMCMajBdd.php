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
        
        $user = "usertest";
        
       $result =  $this->userManager->findUserByUsername($user);
        
       $users = $this->users->searchUser();
        foreach ($users as $user){
            $result =  $this->userManager->findUserByUsername($user['logon']);
            var_dump($user);
            $this->listGroup($user);
            
            
            
            if ($result === null){
                echo "utilisateur non connu";
                $userCreate = $this->userManager->createUser();
                $userCreate->setUsername($user['logon']);
                $userCreate->setUsernameCanonical($user['logon']);
                $userCreate->setEmail($user['email']);
                $userCreate->setPassword($user['password']);
                $userCreate->setEnabled(true);
                //add group if starts with "ROLE"
                $this->addRole($userCreate, $user);
                
                $userCreate->setAddress($user['streetaddress']);
                

                $this->userManager->updateUser($userCreate);
        
            
            //if user is known  
            }else{
                echo "<br>utilisateur connu ";
                //add roles
                $this->addRole($result, $user);
                //update the password in DB if not similar
                $this->checkPassword($result->getPassword(), $user['password'], $result);
                //manage group, if exists - update, if not - create one 
                $this->groupChecker($result, $user);
                
                $this->userManager->updateUser($result);
                //add user in group
                var_dump($user);
                if(isset($user['memberof'])){
                    foreach ($user['memberof'] as $groupName){
                        if(!$this->startsWith($groupName, 'ROLE')){

                          //$group =  $this->groupManager->findGroupByName($groupName);
                          if(!$result->hasGroup($groupName)){
                              echo "<br> l'utilisateur ".$result->getUsername()." n'est pas dans le groupe ".$groupName;
                              $group = $this->groupManager->findGroupByName($groupName);
                              $group->addUser($result);
                          }

                        }
                    }
                }
                
                
                
                
                
                
            }
        }
       
        
    }
    
    
    public function checkPassword($bddPass, $ldapPass, $user){
        
        if($bddPass != $ldapPass){
            $user->setPassword($ldapPass);
        }else{
            echo "<br> password identiques pas de maj";
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

    public function groupChecker($user=null, $data=null){
       
        if(isset($data['memberof'])){
            //if start with ROLE
            foreach ($data['memberof'] as $groupName){
                if(!$this->startsWith($groupName, 'ROLE')){
                    echo "<br> verification existence groupe ".$groupName;
                    //find the group
                   $group= $this->groupManager->findGroupByName($groupName);
                   //if group does not exists
                    if($group === null){
                        echo "<br> le groupe n'existe pas";
                        $group = $this->groupManager->createGroup($groupName);
                        $this->groupManager->updateGroup($group, True);
                    }
                      
                   }
            }
        }
        
        
        $groupe =  $this->groupManager->createGroup("essai");
       $groupe->addRole('ROLE_DSI');
       var_dump($groupe);
        
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