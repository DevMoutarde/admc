<?php

namespace ADMC\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction(){
        return $this->render('ADMCUserBundle:User:index.html.twig');
    }
    
    public function menuAction(){

        $subtitle="Menu User";
        $list=array(
            array('link'=>$this->get('router')->generate('admcuser_modify_user'), 'name'=>'Modifier mes informations personnelles'),
            array('link'=>$this->get('router')->generate('admcuser_request_software'), 'name'=>'Demande de logiciel'),
            array('link'=>$this->get('router')->generate('admcuser_request_network_drive'), 'name'=>'Demande de lecteur réseau')
        );
        return $this->render('ADMCUserBundle:User:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
        ));  
    }
}
