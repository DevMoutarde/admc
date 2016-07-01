<?php

namespace ADMC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Doctrine\UserManager;
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
       
       
       
       $updateBdd->updateBdd();
       
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
        $requestor = $manager->getRepository('ADMCCoreBundle:User')
                        ->find(44);
        
        $roleRequest = $manager->getRepository('ADMCCoreBundle:RoleRequest')
                                                  ->find(1);
        
//=======recuperation de la premiere request      
//        $requestManager = $manager->getRepository('ADMCCoreBundle:Request');
//        $requete = $requestManager->find(1);
//        
//        var_dump($requete->getRequestor()->getFirstName());
        
        
//=====insere une request dans la base=======        
//        $request = new Request;
//        $request->setRequestor($requestor);
//        $request->setRoleRequest($roleRequest);
//        $request->setComments('commentaire');
//        
//        $manager->persist($request);
//        $manager->flush();
//=====================================
        
        
        
        
        
        return $this->render('ADMCCoreBundle:Base:request.html.twig');
    }
    
}
