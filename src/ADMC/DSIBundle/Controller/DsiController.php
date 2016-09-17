<?php

namespace ADMC\DSIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request as RequestForm;
use ADMC\CoreBundle\Entity\Request;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\Security\Core\SecurityContext;
use ADMC\CoreBundle\LdapServices\ADMCMailSender;

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
            array('link'=>$this->get('router')->generate('admcdsi_processed_list'), 'name'=>'Liste des demandes traitées'),
           // array('link'=>$this->get('router')->generate('admcdsi_create_user'), 'name'=>'Créer un utilisateur'),
           // array('link'=>$this->get('router')->generate('admcdsi_delete_user'), 'name'=>'Supprimer un utilisateur'),
           // array('link'=>'#', 'name'=>'Gestion des non-conformités')
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
       $requests=$requestRepository->findByStatus("En attente");

        return $this->render('ADMCDSIBundle:Dsi:requestList.html.twig', array('requetes'=>$requests

        ));
        
    }
    
    public function processedviewAction(){
        return $this->render('ADMCDSIBundle:Dsi:processedView.html.twig');
    }
    public function processedListAction(RequestForm $request){
        $doctManager= $this->getDoctrine()->getManager();
        $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
        $requests=$requestRepository->findByStatus(array('Validée', 'Refusée'));
        
        return $this->render('ADMCDSIBundle:Dsi:processedList.html.twig', array('requetes'=>$requests
        ));
    }
    public function consultProcessedRequestAction($id){
       $doctManager= $this->getDoctrine()->getManager();
       $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
       $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
       $request=$requestRepository->find($id);
       
      
       return $this->render('ADMCDSIBundle:Dsi:viewContentProcessedRequest.html.twig', array(
           'request'=>$request
       ));
    }
    public function consultRequestAction($id){

       $doctManager= $this->getDoctrine()->getManager();
       $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
       $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
       $request=$requestRepository->find($id);
       
       
       return $this->render('ADMCDSIBundle:Dsi:viewContentRequest.html.twig', array(
           'request'=>$request
       ));
    }
    
    
    public function validateRequestAction($id){
        
       // Appel du service de validation de la requête
       $requestManager = $this->container->get('ldap_validate_request');
       $report = $requestManager->analyse($id);
        
        
       // Redirection vers la liste des requêtes en cours
       $doctManager= $this->getDoctrine()->getManager();
       $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
       $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
       
       
       $requests=$requestRepository->findAll();         
       return $this->render('ADMCDSIBundle:Dsi:requestsview.html.twig', array('requetes'=>$requests

        ));
        
    }
    
    public function refuseRequestAction($id){
        
        $sendMail = $this->container->get('ldap_send_mail');
        // récupération de la requete
        $doctManager= $this->getDoctrine()->getManager();
        $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
        $request=$requestRepository->find($id);
        
        // Passage du status "Refusée"
        $request->setStatus("Refusée");
        
        // Remplissage de l'approver
        $currentUser = $this->getUser(); // ok
        $request->setApprover($currentUser); // à corriger
        
        // Validation des modifications
        $doctManager->persist($request);
        $doctManager->flush($request);
        // crée un mail de confirmation
        $mailManager = $this->container->get('admc_core_mail_sender');
        $mailManager->sendMail("test", "sam@admc.com", "test d'envoi de mail");
        // retourne à la liste en fin de traitement
        $requests=$requestRepository->findAll();  
        
        
        
        //mail du demandeur 
        dump($request->getRequestor()->getEmail());
        //nom de la demande
        
        //envoi du mail
        
        return $this->render('ADMCDSIBundle:Dsi:requestsview.html.twig', array('requetes'=>$requests

        ));
    }
}
