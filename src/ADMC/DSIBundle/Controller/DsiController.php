<?php

namespace ADMC\DSIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DsiController extends Controller
{
    public function indexAction(){
        return $this->render('ADMCDSIBundle:Dsi:index.html.twig');
    }
    public function menuAction(){
        $subtitle="Menu DSI";
        $list=array(
            array('link'=>'#', 'name'=>'Liste des demandes en cours'), 
            array('link'=>'#', 'name'=>'Gestion des comptes e-mail'),
            array('link'=>'#', 'name'=>'Etablir la politique de sécurité'),
            array('link'=>'#', 'name'=>'Gestion des non-conformités')
            
        );
        return $this->render('ADMCDSIBundle:Dsi:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
        ));
    }
}
