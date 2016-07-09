<?php


namespace ADMC\CoreBundle\LdapServices;
use \Doctrine\ORM\EntityManager;
use ADMC\CoreBundle\LdapServices\ADMCCreateuser;
use \ADMC\CoreBundle\LdapServices\ADMCAddgroup;
use \ADMC\CoreBundle\LdapServices\ADMCDelUserFromGroup;
use FOS\UserBundle\Doctrine\UserManager;
use FOS\UserBundle\Doctrine\GroupManager;


class ADMCValidateRequest{
    
    private $insertUser;
    private $insertUserInGroup;
    private $deleteUserFromGroup;
    private $doctrineManager;
    private $userManager;
    private $groupManager;
    
    public function __construct(ADMCCreateuser $createUser, ADMCAddgroup $addGroup, ADMCDelUserFromGroup $delUserFromGroup, UserManager $userManager, GroupManager $groupManager, EntityManager $entityManager) {
        
        $this->insertUser = $createUser;
        $this->insertUserInGroup = $addGroup;
        $this->deleteUserFromGroup = $delUserFromGroup;
        $this->userManager = $userManager;
        $this->groupManager = $groupManager;
        $this->doctrineManager = $entityManager;
        
    }
    
    public function analyse($id){
        var_dump($id);
        $doctManager= $this->doctrineManager->getRepository('ADMCCoreBundle:Request');
        $requestorRepository=$this->doctrineManager->getRepository('ADMCCoreBundle:User')->findAll();
        $request=$doctManager->find($id);
        $roleRequest= $request->getRoleRequest()->getRoleName();
        switch ($roleRequest){
            case "Installation logiciel":
                $this.ajouterUtilisateur();
                break;
            case "Connexion lecteur réseau":
                   
                break;
            case "Insertion utilisateur":
                
                break;
            case "Suppression utilisateur":
                
                break;
        }      
        
        
        
    }
    
    
    
}