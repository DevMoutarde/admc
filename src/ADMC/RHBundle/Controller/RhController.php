<?php

namespace ADMC\RHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request as RequestForm;
use ADMC\CoreBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use ADMC\CoreBundle\Entity\Request as RequestSend;



/** 
* Controleur du Bundle Rh
* @author Guillaume Nardizzi
*/
class RhController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADMCRHBundle:Default:index.html.twig');
    }
    /** 
    * Menu déroulant contenant les onglet disponibles pour les Rh 
    *@author Guillaume Nardizzi
    */
    public function menuAction(){

        $subtitle="Menu RH";
        $list=array(
            array('link'=>$this->get('router')->generate('admcrh_request_list'), 'name'=>'Liste des demandes en cours'),
            array('link'=>$this->get('router')->generate('admcrh_create_user'), 'name'=>'Créer utilisateur'),
            array('link'=>$this->get('router')->generate('admcrh_user_list'), 'name'=>'Supprimer un utilisateur')
        );
        return $this->render('ADMCRHBundle:RH:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
        ));  
    }
    
    /** 
    *Affiche la liste des requetes et raffraichit la page avec un appel Ajax à la base de données
    *@author Guillaume Nardizzi
    */
    public function requestsviewAction(){
         return $this->render('ADMCRHBundle:Rh:requestsview.html.twig');
    }  
    
    /** 
    *Liste les requêtes en cours de l'utilisateur RH en cours
    *@param RequestForm $request
    *@author Guillaume Nardizzi 
    */
    public function requestListAction(RequestForm $request){
        $selfuser = $this->getUser();
        $selfuserId=$selfuser->getId();
        $doctManager= $this->getDoctrine()->getManager();
        $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
        $requests=$requestRepository->findBy(
                array('status'                  =>'En attente',
                          'requestor'        =>$selfuserId)
                );
        return $this->render('ADMCRHBundle:Rh:requestList.html.twig', array('requetes'=>$requests
        ));
    }

    /** 
    *affiche la vue contenant les requêtes
    *@author Guillaume Nardizzi
    */           
    public function processedviewAction(){
        return $this->render('ADMCRHBundle:Rh:processedView.html.twig');
    }

    /** 
    *Liste les requêtes validées et refusées 
    *@param RequestForm $request
    *@author Guillaume Nardizzi 
    */      
    public function processedListAction(RequestForm $request){
        $doctManager= $this->getDoctrine()->getManager();
        $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
        $requests=$requestRepository->findByStatus(array('Validée', 'Refusée'));

        return $this->render('ADMCRHBundle:Rh:processedList.html.twig', array('requetes'=>$requests
        ));
    }

    /**
    *consulte une requete en base et l'affiche  
    *@param ID $id
    *@author Guillaume Nardizzi
    */        
    public function consultRequestAction($id){
        $doctManager= $this->getDoctrine()->getManager();
        $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
        $request=$requestRepository->find($id);
        return $this->render('ADMCRHBundle:Rh:viewContentRequest.html.twig', array(
        'request'=>$request
        ));
    }

    /** 
    *  Valide une requête
    * @param ID $id
    * @author Guillaume Nardizzi
    */       
    public function validateRequestAction($id){

        $requestManager = $this->container->get('ldap_validate_request');
        $report = $requestManager->analyse($id);
        $doctManager= $this->getDoctrine()->getManager();
        $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
        $requests=$requestRepository->findAll();         
        return $this->render('ADMCRHBundle:Rh:requestsview.html.twig', array('requetes'=>$requests
        ));
    }
        
    /**
    * Crée un nouvel utilisateur
    * Créé un formulaire avec les données à rentrer en base
    * Insère les données du formulaire en base
    * @param Request $request
    * @author Guillaume Nardizzi
    */
    public function createUserAction(Request $request) {
        $user= new User();
        $selfuser = $this->getUser();
        $formBuilder = $this->get('form.factory')->createBuilder('form', $user);
        $formBuilder
          ->add('lastname',      'text')
          ->add('firstname',      'text')
          ->add('address',       'textarea')
          ->add('postalcode',   'number')
          ->add('town',             'text')
          ->add('save',             'submit')
          ->add('email',            'text')
         ;
        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $UserContainer =  $this->container->get('fos_user.user_manager');
            $em = $this->getDoctrine()->getManager();
            $user->setEmailCanonical($user->getEmail());
            $user->setUsername($user->getLastName());
            $user->setUsernameCanonical($user->getUsername());
            $user->setPassword("pass");
            $em->persist($user);
            $UserContainer->updateUser($user);
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            $requestdsi=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\RoleRequest")->find(3);
            $request1 = new RequestSend;
            $request1->setRequestor($selfuser);
            $request1->setRoleRequest($requestdsi);
            $request1->setUserConcerned($user);
            $request1->setComments('Merci de valider la création de l\utilisateur '.$user->getUsername());
            $request1->setStatus("En attente");
            $em->persist($request1);
            $em->flush();

            return $this->redirect($this->generateUrl('admcrh_user_created', array('id' => $user->getId())));
            }
        return $this->render('ADMCRHBundle:Rh:createUser.html.twig', array(
          'form' => $form->createView(),
        ));
    }

    /**
    * Affiche une liste de l'intégralité des utilisateurs.
    * @author Guillaume Nardizzi
    */      
    public function userListAction(){
        $doctManager= $this->getDoctrine()->getManager();
    //            $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:User');
        $users=$requestRepository->findAll();
        return $this->render('ADMCRHBundle:Rh:userList.html.twig', array(
                'utilisateur'=>$users
        ));
    }
        
        
    /** 
    * Envoie une requete de demande de suppression d'utilisateur en base
    * @param Request $request
    * @param ID $id
    * @author Guillaume Nardizzi 
    */
    public function requestDeleteUserAction(Request $request, $id){

        $selfuser = $this->getUser();
        $user=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\User")->find($id);
        $em = $this->getDoctrine()->getManager();
        $requestdsi=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\RoleRequest")->find(4);
        $request1 = new RequestSend;
        $request1->setRequestor($selfuser);
        $request1->setRoleRequest($requestdsi);
        $request1->setUserConcerned($user);
        $request1->setComments('Merci de valider la suppression de l\utilisateur '.$user->getUsername());
        $request1->setStatus("En attente");
        $em->persist($request1);
        $em->flush();
        return $this->render('ADMCRHBundle:Rh:userDeleted.html.twig');

    }
    
    /** 
    * Affiche une page contenant un message suite à la validation de création d'un utilisateur en base
    * @author Guillaume Nardizzi
    */        
    public function userCreatedAction(){
        return $this->render('ADMCRHBundle:Rh:userCreated.html.twig');
    }
        
    /** 
    * Affiche la page contenant la liste de tous les utilisateurs et la rafraichit via un appel ajax
    * @author Guillaume Nardizzi
    */         
    public function userviewAction(){
         return $this->render('ADMCRHBundle:Rh:userView.html.twig');
    }  

    /** 
    * Annule la requête de suppression d'utilisateur et efface la requête en base 
    * @param ID $id
    *  @author Guillaume Nardizzi
    */    
    public function deleteRequestAction($id){

        $em = $this->getDoctrine()->getEntityManager();
        $request2 = $this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\User")->findAll();
        $request1 = $this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\Request")->find($id);
        $em->remove($request1);
        $em->flush();
        return $this->render('ADMCRHBundle:Rh:requestDeleted.html.twig');

    }
  

}
