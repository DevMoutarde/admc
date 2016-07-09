<?php

namespace ADMC\DSIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request as RequestForm;
use ADMC\CoreBundle\Entity\Request;
use FOS\UserBundle\Doctrine\UserManager;

class DsiController extends Controller
{
    public function indexAction(){
        
        return $this->render('ADMCDSIBundle:Dsi:index.html.twig');
    }
    public function menuAction(){
        /*test user*/
       /* $id_user = 1;
        $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('ADMCCoreBundle:user');
        $user = $repository->find($id_user);
        if(null === $user){
            throw new NotFoundHttpException("l'utilisateur d'id ".$id_user." n'existe pas");
        }

       echo $user;*/
        /*test groups*/
       /* $id_group = 2;
        $group_repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('ADMCCoreBundle:group');
        $group = $group_repository->find($id_group);
        if(null === $group){
            throw new NotFoundHttpException("Le groupe d'id ".$id_group." n'existe pas");

        }*/
    //    echo $group;
        /*test liste*/
        $subtitle="Menu DSI";
        $list=array(
            array('link'=>$this->get('router')->generate('admcdsi_request_list'), 'name'=>'Liste des demandes en cours'), 
            array('link'=>'#', 'name'=>'Gestion des comptes e-mail'),
            array('link'=>'#', 'name'=>'Etablir la politique de sécurité'),
            array('link'=>'#', 'name'=>'Gestion des non-conformités')
            
        );
        return $this->render('ADMCDSIBundle:Dsi:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
        ));  
    }
    public function requestsviewAction(){
               
 
        return $this->render('ADMCDSIBundle:Dsi:requestsview.html.twig');
    }
    
    
    
    public function requestListAction(RequestForm $request){
        
       $doctManager= $this->getDoctrine()->getManager();
       $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
       $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');

       $requests=$requestRepository->findAll();         
        return $this->render('ADMCDSIBundle:Dsi:requestList.html.twig', array('requetes'=>$requests

        ));
        
    }
    public function processedListAction(RequestForm $request){
        $doctManager= $this->getDoctrine()->getManager();
        $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
        $request=$Repository=$doctManager->findAll();
        return $this->render('ADMCDSIBundle:Dsi:processedList.html.twig', array('requetes'=>$requests
        ));
    }
    
    public function consultRequestAction($id){
        //var_dump($id);

       $doctManager= $this->getDoctrine()->getManager();
       $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
       $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
       $request=$requestRepository->find($id);
       
       
       
       return $this->render('ADMCDSIBundle:Dsi:viewContentRequest.html.twig', array(
           'request'=>$request
       ));
    }
    
    
    public function validateRequestAction($id){
        
        $requestManager = $this->container->get('ldap_validate_request');
        $requestManager->analyse($id);
        
        

        return $this->render('ADMCDSIBundle:Dsi:index.html.twig');
        
    } 
}
