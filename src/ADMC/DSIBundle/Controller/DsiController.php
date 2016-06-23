<?php

namespace ADMC\DSIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DsiController extends Controller
{
    public function indexAction(){
        return $this->render('ADMCDSIBundle:Dsi:index.html.twig');
    }
    public function menuAction(){
<<<<<<< HEAD
        /*test user*/
        $id_user = 1;
        $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('ADMCCoreBundle:user');
        $user = $repository->find($id_user);
        if(null === $user){
            throw new NotFoundHttpException("l'utilisateur d'id ".$id_user." n'existe pas");
        }
        echo $user;
        /*test groups*/
        $id_group = 2;
        $group_repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('ADMCCoreBundle:group');
        $group = $group_repository->find($id_group);
        if(null === $group){
            throw new NotFoundHttpException("Le groupe d'id ".$id_group." n'existe pas");
        }
        echo $group;
        /*test liste*/
=======
        $subtitle="Menu DSI";
>>>>>>> 8b06a2fd7873b5d52114bbfbfa2cc414536b09e5
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
