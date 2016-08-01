<?php

namespace ADMC\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request as RequestForm;
use ADMC\CoreBundle\Entity\Request;
use FOS\UserBundle\Doctrine\UserManager;

class UserController extends Controller
{
    public function indexAction(){
        return $this->render('ADMCUserBundle:User:index.html.twig');
    }
    public function menuAction(){

        $subtitle="Menu Utilisateur";
        $list=array(
            array('link'=>$this->get('router')->generate('admcuser_request_networkdrive_view'), 'name'=>'Demande de lecteur réseau'),
            array('link'=>$this->get('router')->generate('admcuser_request_software_view'), 'name'=>'Demande de logiciel'),
            array('link'=>$this->get('router')->generate('admcuser_request_own_list'), 'name'=>'Consultation/Modification de mes informations personnelles')
        );
        return $this->render('ADMCUserBundle:User:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
        )); 
    }
    
    public function requestsOwnListAction(){

            return $this->render('ADMCUserBundle:User:requestsOwnList.html.twig');
    }
    
    public function requestsviewAction(){
        return $this->render('ADMCUserBundle:User:requestsview.html.twig');
    } 
    
    public function requestSoftwareAction(){
            return $this->render('ADMCUserBundle:User:requestsview.html.twig');
    }
    
    public function requestNetworkAction(){
            return $this->render('ADMCUserBundle:User:requestsview.html.twig');
    }
    
    
}
