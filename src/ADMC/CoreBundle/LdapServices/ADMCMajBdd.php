<?php

namespace ADMC\CoreBundle\LdapServices;
use \Doctrine\ORM\EntityManager;
use \ADMC\CoreBundle\LdapServices\ADMCSearchAllUsers;
use FOS\UserBundle\Doctrine\UserManager;


class ADMCMajBdd{
    
    private $connect;
    private $em;
    private $users;
    private $userManager;
    
    public function __construct(ADMCConnector $connector, EntityManager $entityManager, ADMCSearchAllUsers $users, UserManager $userManager){
        $this->connect = $connector;
        $this->em = $entityManager;
        $this->users = $users;
        $this->userManager = $userManager;
    }
    
    public function updateBdd(){
        
        $user = "usertest";
        
       $result =  $this->userManager->findUserByUsername($user);
        
        $users = $this->users->searchUser();
        var_dump($users);
        foreach ($users as $user){
            var_dump($user['email']);
        }
//        if ($result === null){
//            $user = $this->userManager->createUser();
//            $user->setUsername("usertest");
//            $user->setUsernameCanonical("usertest");
//            $user->setEmail("test@admc.com");
//            $user->setPassword("md5");
//            $user->setEnabled(true);
//            $user->setRoles(array('ROLE_USER'));
//            
//            $this->userManager->updateUser($user);
//            
//                   
//        }else{
//            echo "<br>utilisateur connu, mdp: ";
//        }
        
        
        
        
        
        
        
    }
    
    
    
}