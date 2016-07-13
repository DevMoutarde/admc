<?php

namespace ADMC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Doctrine\UserManager;
use FOS\UserBundle\Doctrine\GroupManager;
use \ADMC\CoreBundle\Entity\Request;


/**
 * Controlleur principal - démarre l'application
 */
class BaseController extends Controller
{
    /**
     * affiche la page d'accueil + contient les déclarations de certains services en guise de tests
     * Contacte le serveur AD et mets à jour les données en base
     */
 
    public function indexAction(){
        
        //$pass = $this->container->get('my_password_encoder');
        //echo $pass->encodePassword("Donjon2016","fkjh");
       
       $addUser = $this->container->get('ldap_insert_user');
       $listUsers = $this->container->get('ldap_list_all_users');
       $updateBdd = $this->container->get('ldap_update_database');
       //$addUser->createUser();
       
       $utilisateurs = $listUsers->searchUser();
       $updateBdd->updateBdd();
       
//       $em = $this->getDoctrine()->getManager();
//       $repo = $em->getRepository('ADMCCoreBundle:Group');
//       $group = $repo->find(7);
//       
//       $entityManager = $this->container->get('fos_user.user_manager');
//       $user = $entityManager->findUserByUsername('jmiller');
//       
//       $user->addGroup($group);
//       $entityManager->updateUser($user);
//       
       
       
       

     

       //$manager = $this->get('fos_user.user_manager');
       
       //$user=$manager->findUserByUsername("admin");
       
//=====envoi de mails====================
//      
//       $message = \Swift_Message::newInstance()
//               ->setSubject('hello')
//               ->setFrom('user@srvMail')
//               ->setTo('sandrine@srvMail')
//               ->setBody('test envoi de mail à partir de l\'application');
//       $this->get('mailer')->send($message);
//       
//====================================
       
       
       
       
       
       
       
        return $this->render('ADMCCoreBundle:Base:index.html.twig');
    }
    
    
    
    //générateur de menu qui déportera l'affichage dans le layout principal
    /**
     * Génère le menu qui sera déporté sur le layout principal
     * @return menu.html.twig
     */
    public function menuAction(){
        
        //test1
        $items = array(
            array('link' => '#', 'name' => 'menu1'),
            array('link' =>'#', 'name' => 'menu2'),
            array('link' =>'#', 'name' => 'menu3')
        );
        
        return $this->render('ADMCCoreBundle:Base:menu.html.twig', array(
            'listMenu' => $items));
    }
    
    
    
    public function rhAction(){
        
        return $this->render('ADMCCoreBundle:Base:rh.html.twig');
    }
    
    
    //multiples essais d'ajout d'utilisateurs dans des groupes en bdd + création d'une requête utilisateur
    public function requestAction(){
        
        $manager = $this->getDoctrine()->getManager();
//        
//        $requestor = $manager->getRepository('ADMCCoreBundle:User')
//                        ->find(44);
//        
//        $roleRequest = $manager->getRepository('ADMCCoreBundle:RoleRequest')
//                                                  ->find(1);
        
//=======recuperation de la premiere request      

//        $requestManager = $manager->getRepository('ADMCCoreBundle:Request');
//        $requete = $requestManager->find();
        
      //  var_dump($requete);
        
        
        // FONCTIONNEL trouver un groupe==============
//        $em = $this->getDoctrine()->getManager();
//       $repo = $em->getRepository('ADMCCoreBundle:Group');
//       $group = $repo->find(7);
      // var_dump($group);
        
       
//   $managerGroup = $this->container->get('fos_user.group_manager');
//   $group = $managerGroup->findGroupBy(array ('id'=>7));
//   
//    $managerUser = $this->container->get('fos_user.user_manager');      
//    $userRequestor = $managerUser->findUserBy(array ('username' => 'guillaume'));
//    
//    $userConcerned = $managerUser->findUserBy(array ('username' => 'ccervos'));
    
    
        
//=====insere une request dans la base=======        
//        $request = new Request;
//        $request->setRequestor($userRequestor);
//        $request->setRoleRequest($roleRequest);
//        $request->setGroup($group);
//        $request->setComments('Merci de m\'ajouter le logiciel x');
//
//        $manager->persist($request);
//        $manager->flush();
//=====================================
        
        
        
        
        
        return $this->render('ADMCCoreBundle:Base:request.html.twig');
    }
    
    
    //test d'ajout utilisateur
    public function addUserAction(){
        
        
        $manager = $this->get('fos_user.user_manager');
       
       $userTest=$manager->findUserByUsername("crausaz");
        
        if ($userTest === null){
            
            $UserContainer =  $this->container->get('fos_user.user_manager');
            $user = $UserContainer->createUser();
            $user->setUsername("crausaz");
            $user->setUsernameCanonical("crausaz");
            $user->setEmail("crausaz@admc.com");
            $user->setEmailCanonical("crausaz@admc.com");
            $user->setEnabled(True);
            $user->setPassword("pass");
            $user->setAddress("2 rue truc");
            $user->setTown("Toulouse");
            $user->setFirstName("audrey");
            $user->setLastName("crausaz");
            $user->setPostalCode(31400);
            var_dump($user);

            $UserContainer->updateUser($user);
            
            
        }
        
//        var_dump($userTest->getUsername());
//        
        $addUser = $this->container->get('ldap_insert_user');

        $addUser->createUserByObject($userTest);
        
        
       return $this->render('ADMCCoreBundle:Base:index.html.twig');
        
    }
    
    
    //test d'ajout dans un groupe puis suppression d'utilisateur d'un groupe
    public function addGroupAction(){
        
        $manager = $this->getDoctrine()->getManager();
        
        $requestUser = $manager->getRepository('ADMCCoreBundle:User');
        $requestUser->findAll();
        
        $requestManager = $manager->getRepository('ADMCCoreBundle:Request');
        $requete = $requestManager->find(3);
        
        //var_dump($requete);
        
        $user = $requete->getUserConcerned()->getUsername();
        $group = $requete->getGroup()->getName();
        
//        $addUser = $this->container->get('ldap_insert_user_in_group');
//        var_dump($addUser->addGroup($group, $user));
        $delUser = $this->container->get('ldap_delete_user_from_group');
        $delUser->delUserFromGroup($group, $user);
        return $this->render('ADMCCoreBundle:Base:index.html.twig');
    }
    
    
    //liste les groupes en fonction d'un utilisateur
    public function listGroupAction(){
        
        $listGroup = $this->container->get('ldap_list_group_by_user');
        //var_dump($listGroup->listUserByGroup('libellule'));
        var_dump($listGroup->listGroupByUser('jmiller'));
        
        
        
        return $this->render('ADMCCoreBundle:Base:listGroup.html.twig');
    }
    
    public function modifyUserAction(){
        
        $modify = $this->container->get('ldap_modify_user');
        $managerUser = $this->container->get('fos_user.user_manager'); 
        $userRequestor = $managerUser->findUserBy(array ('username' => 'crausaz'));
        $userRequestor->setAddress("36 rue benjamin constant");
        $managerUser->updateUser($userRequestor);
        
        $modify->modifyUser($userRequestor);
        return $this->render('ADMCCoreBundle:Base:index.html.twig');
    
    }
    
    public function deleteUserAction(){
        
        $deleteUser = $this->container->get('ldap_delete_user');
        $managerUser = $this->container->get('fos_user.user_manager'); 
        $userToDelete = $managerUser->findUserBy(array ('username' => 'delaunay'));
        
        if ($deleteUser->deleteUser($userToDelete)){
            echo "reussite de l'operation";
        }else{
            echo "echec de l'operation";
        }
        return $this->render('ADMCCoreBundle:Base:index.html.twig');
    }
    
}
