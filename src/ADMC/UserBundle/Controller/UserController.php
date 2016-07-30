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
            array('link'=>$this->get('router')->generate('admcdsi_request_view'), 'name'=>'Liste de mes demandes en cours'),
            array('link'=>'#', 'name'=>'1'),
            array('link'=>'#', 'name'=>'2'),
            array('link'=>'#', 'name'=>'3'),
        );
        return $this->render('ADMCUserBundle:User:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
        )); 
    }
    public function requestsOwnListAction(RequestForm $request){
        $doctManager = $this->getDoctrine()->getManager();
        $requestorRepository = $doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository = $doctManager->getRepository('ADMCCoreBundle:Request');
        $requests = $requestRepository->findByStatus("En attente");
        return $this->render('ADMCUserBundle:User:requestsOwnList.html.twig', array('requetes' => $requests
        ));
    }
    public function requestsviewAction(){
        return $this->render('ADMCUserBundle:User:requestsview.html.twig');
    } 
    
}
