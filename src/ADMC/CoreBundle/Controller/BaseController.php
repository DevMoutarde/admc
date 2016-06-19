<?php

namespace ADMC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    public function indexAction(){
        
        //$pass = $this->container->get('my_password_encoder');
        //echo $pass->encodePassword("md5","f");
       
       $listUsers = $this->container->get('ldap_list_all_users');
       $updateBdd = $this->container->get('ldap_update_database');
       $listUsers->searchUser();
       
       $updateBdd->updateBdd();
       
       $manager = $this->get('fos_user.user_manager');
       
       $user=$manager->findUserByUsername("admin");
       
       //echo $user->getPassword();
       
       
       
       
       
       
       
       
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
    
}
