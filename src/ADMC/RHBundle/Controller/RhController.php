<?php

namespace ADMC\RHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RhController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADMCRHBundle:Default:index.html.twig');
    }
    
        public function menuAction(){

        $subtitle="Menu RH";
        $list=array(
            array('link'=>$this->get('router')->generate('admcrh_request_list'), 'name'=>'Liste des demandes en cours'),
            array('link'=>'#', 'name'=>'Créer utilisateur'),
            array('link'=>'#', 'name'=>'Modifier utilisateur'),
        );
        return $this->render('ADMCRHBundle:RH:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
        ));  
    }
}
