<?php

namespace ADMC\CoreBundle\LdapServices;
use \Doctrine\ORM\EntityManager;
use \ADMC\CoreBundle\LdapServices\ADMCSearchAllUsers;

class ADMCMajBdd{
    
    private $connect;
    private $em;
    private $users;
    
    public function __construct(ADMCConnector $connector, EntityManager $entityManager, ADMCSearchAllUsers $users){
        $this->connect = $connector;
        $this->em = $entityManager;
        $this->users = $users;
    }
    
    public function updateBdd(){
        
        echo "majbdd";
        $repoUser = $this->em->getRepository('ADMCCoreBundle:User');
        $results = $repoUser->findOneBy(array('username' => 'admin'));
        
        var_dump($results.password);
        
        
    }
    
    
    
}