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
                var_dump($this->ajouterUserDansGroup($request));
                break;
            case "Connexion lecteur réseau":
                $this->ajouterUserDansGroup($request->getGroup(), $request->getUserConcerned());
                break;
            case "Insertion utilisateur":
                $this->ajouterUtilisateur($request->getUserConcerned(), $request->getApprover());
                break;
            case "Suppression utilisateur":
                break;
        }      
        
        
        
    }
    
    public function ajouterUtilisateur($user, $approver){
        
        $this->insertUser->createUserByObject($user);
        
    }
    
    public function ajouterUserDansGroup($request){
        $group=$request->getGroup();
        $user=$request->getUserConcerned();
        //$approver=$this->getUser();
        $rapport = $this->insertUserInGroup->addGroup($group, $user);
        var_dump($approver);
        return $rapport;
        
        
    }
    
    
    
    
    
}