<?php

namespace ADMC\DSIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DsiController extends Controller
{
    public function indexAction(){
        return $this->render('ADMCDSIBundle:Dsi:index.html.twig');
    }
    public function menuAction(){
        $list=array(
            array('link'=>'#', 'name'=>'Requete'), 
            array('link'=>'#', 'name'=>'Commentaire')
        );
        return $this->render('ADMCDSIBundle:Dsi:menu.html.twig', array(
            'menu'=>$list
        ));
    }
}
