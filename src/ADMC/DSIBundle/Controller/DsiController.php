<?php

namespace ADMC\DSIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request as RequestForm;
use ADMC\CoreBundle\Entity\Request;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\Security\Core\SecurityContext;
use ADMC\CoreBundle\LdapServices\ADMCSendMail;

/** 
* Controleur du Bundle Dsi
* @author Samuel Salles
*/
class DsiController extends Controller
{
    
    /** 
    * @author Samuel Salles
    */    
    public function indexAction(){
        return $this->render('ADMCDSIBundle:Dsi:index.html.twig');
    }
    
    /** 
    * Menu déroulant contenant les onglet disponibles pour les Utilisateurs
    * @author Samuel Salles
    */            
    public function menuAction(){
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
    
    /** 
    * Affiche la liste des requetes et raffraichit la page avec un appel Ajax à la base de données
    * @author Samuel Salles
    */    
    public function requestsviewAction(){
        return $this->render('ADMCDSIBundle:Dsi:requestsview.html.twig');
    }
    
    /** 
    * Liste l'intégralité des requêtes de status "en attente"
    * @param Requete $request
    * @author Samuel Salles
    */    
    public function requestListAction(RequestForm $request){
       $doctManager= $this->getDoctrine()->getManager();
       $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
       $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
       $requests=$requestRepository->findByStatus("En attente");
        return $this->render('ADMCDSIBundle:Dsi:requestList.html.twig', array('requetes'=>$requests
        ));
    }
 
    /** 
    * Controleur du Bundle Dsi
    * affiche la vue contenant les requêtes
    * @author Samuel Salles
    */               
    public function processedviewAction(){
        return $this->render('ADMCDSIBundle:Dsi:processedView.html.twig');
    }
    
    /** 
    * Liste les requêtes validées et refusées
    * @param ID Requete $request
    * @author Samuel Salles
    */        
    public function processedListAction(RequestForm $request){
        $doctManager= $this->getDoctrine()->getManager();
        $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
        $requests=$requestRepository->findByStatus(array('Validée', 'Refusée'));
         return $this->render('ADMCDSIBundle:Dsi:processedList.html.twig', array('requetes'=>$requests
        ));
    }
    
    /** 
    * Consulte une requete en base et l'affiche  
    * @param ID $id
    * @author Samuel Salles
    */    
    public function consultProcessedRequestAction($id){
       $doctManager= $this->getDoctrine()->getManager();
       $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
       $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
       $request=$requestRepository->find($id);
       return $this->render('ADMCDSIBundle:Dsi:viewContentProcessedRequest.html.twig', array(
           'request'=>$request
       ));
    }
    
    /** 
    * Consulte une requete en base et l'affiche  
    * @param ID $id
    * @author Samuel Salles
    */              
    public function consultRequestAction($id){

       $doctManager= $this->getDoctrine()->getManager();
       $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
       $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
       $request=$requestRepository->find($id);
       return $this->render('ADMCDSIBundle:Dsi:viewContentRequest.html.twig', array(
           'request'=>$request
       ));
    }
    
    /** 
    * Valide une requête
    * @param ID $id
    * @author Samuel Salles
    */        
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
    
    /** 
    * Refuse une requête et envoit un mail au créateur de la requête
    * @param ID $id
    * @author Samuel Salles
    */      
    public function refuseRequestAction($id){
        
        // récupération de la requete
        $doctManager= $this->getDoctrine()->getManager();
        $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
        $request=$requestRepository->find($id);
        $requestRole = $request->getRoleRequest()->getRoleName();
        // Passage du status "Refusée"
        $request->setStatus("Refusée");
        // Récuperation de l'approver
        $currentUser = $this->getUser(); 
        $request->setApprover($currentUser); 
        // Récuperation du requestor
        $requestor = $request->getRequestor();
        $requestorMail = $requestor->getEmail();
        // Validation des modifications
        $doctManager->persist($request);
        $doctManager->flush($request);
        // crée un mail de confirmation
        $requestManager = $this->container->get('ldap_send_mail');
        $sendMail = $requestManager->envoyerMail($requestorMail,"demande refusée","Bonjour, votre de demande de " . $requestRole . " à été refusée");
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
