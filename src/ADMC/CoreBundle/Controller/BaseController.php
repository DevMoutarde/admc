<?php

namespace ADMC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Doctrine\UserManager;
use FOS\UserBundle\Doctrine\GroupManager;
use \ADMC\CoreBundle\Entity\Request;

class BaseController extends Controller
{
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
    
    
    public function addUserAction(){
        
        
        $manager = $this->get('fos_user.user_manager');
       
       $userTest=$manager->findUserByUsername("ccervos");
        
        if ($userTest === null){
            
            $UserContainer =  $this->container->get('fos_user.user_manager');
            $user = $UserContainer->createUser();
            $user->setUsername("ccervos");
            $user->setUsernameCanonical("ccervos");
            $user->setEmail("cervos@admc.com");
            $user->setEmailCanonical("cervos@admc.com");
            $user->setEnabled(False);
            $user->setPassword("pass");
            $user->setAddress("2 rue truc");
            $user->setTown("Toulouse");
            $user->setFirstName("cedric");
            $user->setLastName("cervos");
            $user->setPostalCode(31400);
            var_dump($user);

            $UserContainer->updateUser($user);
            
            
        }
        
//        var_dump($userTest->getUsername());
//        
//        $addUser = $this->container->get('ldap_insert_user');
//        $addUser->createUserByObject($userTest);
        
        
       return $this->render('ADMCCoreBundle:Base:index.html.twig');
        
    }
    
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
    
}
