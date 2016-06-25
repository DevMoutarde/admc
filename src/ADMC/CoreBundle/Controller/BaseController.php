<?php

namespace ADMC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Doctrine\UserManager;

class BaseController extends Controller
{
    public function indexAction(){
        
        //$pass = $this->container->get('my_password_encoder');
        //echo $pass->encodePassword("Donjon2016","fkjh");
       
       $listUsers = $this->container->get('ldap_list_all_users');
       $updateBdd = $this->container->get('ldap_update_database');
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
    
}
