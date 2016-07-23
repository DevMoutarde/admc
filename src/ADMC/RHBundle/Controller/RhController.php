<?php

namespace ADMC\RHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RHController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADMCRHBundle:Default:index.html.twig');
    }
    
//        public function menuAction(){
//
//        $subtitle="Menu RH";
//        $list=array(
//            array('link'=>$this->get('router')->generate('admcrh_request_list'), 'name'=>'Liste des demandes en cours'),
//            array('link'=>$this->get('router')->generate('admcrh_processed_list'), 'name'=>'Liste des demandes traitées'),
//            array('link'=>'#', 'name'=>'Gestion des comptes e-mail'),
//            array('link'=>'#', 'name'=>'Etablir la politique de sécurité'),
//            array('link'=>'#', 'name'=>'Gestion des non-conformités')
//        );
//        return $this->render('ADMCRHBundle:RH:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
//        ));  
//    }
}
