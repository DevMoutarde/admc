<?php


namespace ADMC\CoreBundle\LdapServices;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Doctrine\ORM\EntityManager;
use ADMC\CoreBundle\LdapServices\ADMCCreateuser;
use \ADMC\CoreBundle\LdapServices\ADMCAddgroup;
use \ADMC\CoreBundle\LdapServices\ADMCDelUserFromGroup;
use FOS\UserBundle\Doctrine\UserManager;
use FOS\UserBundle\Doctrine\GroupManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use ADMC\CoreBundle\LdapServices\ADMCDeleteUser;
use ADMC\CoreBundle\Entity\User;
use ADMC\CoreBundle\LdapServices\ADMCSendMail;




/**
 * Classe ADMCValidateRequest
 * Permet au DSI de valider une requête et execute le service correspondant
 */
class ADMCValidateRequest{
    
    private $insertUser;
    private $insertUserInGroup;
    private $deleteUserFromGroup;
    private $doctrineManager;
    private $userManager;
    private $groupManager;
    private $security;
    private $deleteUser;
    private $mailManager;
    
    /**
     * 
     * @param ADMCCreateuser $createUser
     * @param ADMCAddgroup $addGroup
     * @param ADMCDelUserFromGroup $delUserFromGroup
     * @param UserManager $userManager
     * @param GroupManager $groupManager
     * @param EntityManager $entityManager
     * @param type $token
     */
    public function __construct(ADMCCreateuser $createUser, ADMCAddgroup $addGroup, ADMCDelUserFromGroup $delUserFromGroup, UserManager $userManager, GroupManager $groupManager, EntityManager $entityManager,  $token, ADMCDeleteUser $deleteUser, ADMCSendMail $mailManager) {
        
        $this->insertUser = $createUser;
        $this->insertUserInGroup = $addGroup;
        $this->deleteUserFromGroup = $delUserFromGroup;
        $this->userManager = $userManager;
        $this->groupManager = $groupManager;
        $this->doctrineManager = $entityManager;
        $this->security = $token;
        $this->deleteUser = $deleteUser;
        $this->mailManager = $mailManager;
        
        
    }
    
    
    /**
     * La méthode analyse permet de lancer les requêtes en fonction du type de requête
     * et appelle le service correspondant
     * @param str  $id  L'id de la requête à traiter
     * @return Boolean  Indique si la tache est accomplie ou non
     * @author Fourcault Gabin
     */
    public function analyse($id){
        
        $doctManager= $this->doctrineManager->getRepository('ADMCCoreBundle:Request');
        
        $requestorRepository=$this->doctrineManager->getRepository('ADMCCoreBundle:User')->findAll();
        $request=$doctManager->find($id);
        $roleRequest= $request->getRoleRequest()->getRoleName();


        
        $approverUsername = $this->security->getToken()->getUser();
        $approver = $this->userManager->findUserByUsername($approverUsername);
        $report = False;
        switch ($roleRequest){
            case "Logiciel":
                $report = $this->ajouterUserDansGroup($request);
                if($report){
                   $this->mailManager->envoyerMail("jmiller@admc.com","Demande acceptée", "Votre demande d'ajout de logiciel a été acceptée."); 
                }
                break;
            
            case "Lecteur Réseau":
                $report = $this->ajouterUserDansGroup($request);
                break;
            
            case "Insérer utilisateur":
                $this->ajouterUtilisateur($request->getUserConcerned());
                // activer l'utilisateur en bdd
                $this->activerUtilisateur($request->getUserConcerned());
                $report = True; // a reprendre
                break;
            
            case "Supprimer utilisateur":
                $this->supprimerUtilisateur($request->getUserConcerned());
                $report = True; // a reprendre
                break;
        }
        
        
        
        
        if ($report){
            $request->setStatus("Validée");
            $request->setApprover($approver); //corrigé par Sam
            $this->doctrineManager->flush($request);
            
        }
        return $report;
        
        
    }
    
    
     /**
     * La méthode ajouterUtilisateur appelle le service d'ajout d'utilisateurs
     * @param User  $user L'objet de l'entité User
     * @author Fourcault Gabin
     */
    public function ajouterUtilisateur($user){
        
        $this->insertUser->createUserByObject($user);
        
    }
    
    
     /**
     * La méthode ajouterUserDansGroup
     * @param Request  $request  L'objet de la requête à traiter
     * @return Boolean  Indique si la tache est accomplie ou non
     * @author Fourcault Gabin
     */
    public function ajouterUserDansGroup($request){
        $group=$request->getGroup();
        $user=$request->getUserConcerned();
        //$approver=$this->getUser();
        $rapport = $this->insertUserInGroup->addGroup($group, $user);
        if ($rapport == True){
            echo "opération terminée avec succes";
        }else{
            echo "echec de l'opération, contactez votre administrateur";
        }
        //var_dump($approver);
        return $rapport;
        
        
    }
     /**
     * La méthode supprimerUtilisateur
     * @param User  $user L'objet de l'entité User
     * @author Salles Samuel
     */
    public function supprimerUtilisateur($user){
        
        $this->deleteUser->deleteUser($user);
    }  
    
    /**
     * La méthode activerUtilisateur
     * @param User  $user L'objet de l'entité User
     * @author Salles Samuel
     */
    public function activerUtilisateur($user){
        $user->setEnabled(true);
        $this->userManager->updateUser($user);
    }
}