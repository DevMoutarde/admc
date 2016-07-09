<?php


namespace ADMC\CoreBundle\LdapServices;
use \Doctrine\ORM\EntityManager;
use ADMC\CoreBundle\LdapServices\ADMCCreateuser;
use \ADMC\CoreBundle\LdapServices\ADMCAddgroup;
use \ADMC\CoreBundle\LdapServices\ADMCDelUserFromGroup;
use FOS\UserBundle\Doctrine\UserManager;
use FOS\UserBundle\Doctrine\GroupManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;



class ADMCValidateRequest{
    
    private $insertUser;
    private $insertUserInGroup;
    private $deleteUserFromGroup;
    private $doctrineManager;
    private $userManager;
    private $groupManager;
    private $security;
    
    
    public function __construct(ADMCCreateuser $createUser, ADMCAddgroup $addGroup, ADMCDelUserFromGroup $delUserFromGroup, UserManager $userManager, GroupManager $groupManager, EntityManager $entityManager,  $token) {
        
        $this->insertUser = $createUser;
        $this->insertUserInGroup = $addGroup;
        $this->deleteUserFromGroup = $delUserFromGroup;
        $this->userManager = $userManager;
        $this->groupManager = $groupManager;
        $this->doctrineManager = $entityManager;
        $this->security = $token;
        
        
    }
    
    public function analyse($id){
        
        $doctManager= $this->doctrineManager->getRepository('ADMCCoreBundle:Request');
        
        $requestorRepository=$this->doctrineManager->getRepository('ADMCCoreBundle:User')->findAll();
        $request=$doctManager->find($id);
        $roleRequest= $request->getRoleRequest()->getRoleName();
        
        
        $approverUsername = $this->security->getToken()->getUser();
        $approver = $this->userManager->findUserByUsername($approverUsername);
        $report = False;
        switch ($roleRequest){
            case "Installation logiciel":
                $report = $this->ajouterUserDansGroup($request);
                break;
            
            case "Connexion lecteur réseau":
                $this->ajouterUserDansGroup($request);
                break;
            
            case "Insertion utilisateur":
                $this->ajouterUtilisateur($request->getUserConcerned());
                break;
            
            case "Suppression utilisateur":
                break;
        }
        
        
        
        
        if ($report){
            $request->setStatus("Validé");
            $request->setRequestor($approver);
            $this->doctrineManager->flush($request);
            
        }
        return $report;
        
        
    }
    
    public function ajouterUtilisateur($user){
        
        $this->insertUser->createUserByObject($user);
        
    }
    
    public function ajouterUserDansGroup($request){
        $group=$request->getGroup();
        $user=$request->getUserConcerned();
        //$approver=$this->getUser();
        $rapport = $this->insertUserInGroup->addGroup($group, $user);
        if ($rapport == True){
            echo "opération terminée avec succes";
        }else{
            echo "echec de l'oppération, contactez votre administrateur";
        }
        //var_dump($approver);
        return $rapport;
        
        
    }
    
    
    
    
    
}