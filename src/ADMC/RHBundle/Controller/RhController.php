<?php

namespace ADMC\RHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RhController extends Controller
{
    public function indexAction(){
        return $this->render('ADMCRHBundle:Rh:index.html.twig');
    }
    
        public function menuAction(){

        $subtitle="Menu RH";
        $list=array(
            array('link'=>$this->get('router')->generate('admcrh_request_list'), 'name'=>'Liste des demandes en cours'),
            array('link'=>'#', 'name'=>'Création user'),
            array('link'=>'#', 'name'=>'Modification user')
            //attribution logiciel MAIS DANS USER
            //attribution lecteur réseau MAIS DANS USER
        );
        return $this->render('ADMCRHBundle:Rh:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
        ));  
    }
}
