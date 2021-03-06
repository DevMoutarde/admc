<?php

namespace ADMC\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request as RequestForm;
use ADMC\CoreBundle\Entity\Request as RequestSend;
use ADMC\CoreBundle\Entity\User;
use ADMC\CoreBundle\Entity\Group;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/** 
 * Controleur du Bundle User
 * @author Guillaume Nardizzi
 */
class UserController extends Controller
{
    
    /** 
     * @author Guillaume Nardizzi
    */    
    public function indexAction(){
        return $this->render('ADMCUserBundle:User:index.html.twig');
    }
    
    /** 
    * Menu déroulant contenant les onglet disponibles pour les Utilisateurs
    * @author Guillaume Nardizzi
    */    
    public function menuAction(){

        $subtitle="Menu Utilisateur";
        $list=array(
            array('link'=>$this->get('router')->generate('admcuser_request_networkdrive_view'), 'name'=>'Demande de lecteur réseau'),
            array('link'=>$this->get('router')->generate('admcuser_request_software_view'), 'name'=>'Demande de logiciel'),
            array('link'=>$this->get('router')->generate('admcuser_request_own_list'), 'name'=>'Consultation/Modification de mes informations personnelles'),
            array('link'=>$this->get('router')->generate('admcuser_request_list'), 'name'=>'Liste des demandes en cours')

        );
        return $this->render('ADMCUserBundle:User:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
        )); 
    }
    
    /** 
    * Affiche la liste des coordonées personnelles de l'utilisateur
    * @param Request $request 
    * @author Guillaume Nardizzi
    */    
    public function requestsOwnListAction(RequestForm $request){
        $selfuser = $this->getUser();
        $formBuilder = $this->get('form.factory')->createBuilder('form', $selfuser);
        $formBuilder
          ->add('lastname',      'text',array('read_only' => true))
          ->add('firstname',      'text',array('read_only' => true))
          ->add('address',       'textarea')
          ->add('postalcode',   'number')
          ->add('town',             'text')
          ->add('save',             'submit')
         ;
        $form = $formBuilder->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
              $UserContainer =  $this->container->get('fos_user.user_manager');
              $em = $this->getDoctrine()->getManager();
              $em->persist($selfuser);
              $UserContainer->updateUser($selfuser);
              $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
              
              $requestManager = $this->container->get('ldap_modify_user');
              $modifUser=$requestManager->modifyUser($selfuser);

              
//              $requestdsi=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\RoleRequest")->find(3);
//              $request1 = new RequestSend;
//              $request1->setRequestor($selfuser);
//              $request1->setRoleRequest($requestdsi);
//              $request1->setUserConcerned($selfuser);
//              $request1->setComments('Merci de valider la modification  de l\utilisateur '.$selfuser->getUsername());
//              $request1->setStatus("En attente");
//              $em->persist($request1);
//              $em->flush();
              return $this->render('ADMCUserBundle:User:requestsOwnList.html.twig', array(
                'form' => $form->createView(),
              ));
        }

        return $this->render('ADMCUserBundle:User:requestsOwnList.html.twig', array(
          'form' => $form->createView(),
        ));
 }

    /** 
   * Affiche la liste des requetes et raffraichit la page avec un appel Ajax à la base de données
   * Controleur du Bundle User
   * @author Guillaume Nardizzi
   */ 
    public function requestsviewAction(){
        return $this->render('ADMCUserBundle:User:requestsview2.html.twig');
    } 
    
    /** 
    * Envoie une requete de demande de Logiciel à la DSI
    * @param Request $request  
    * @author Guillaume Nardizzi
    */    
    public function requestSoftwareAction(RequestForm $request){
        $selfuser = $this->getUser();
        $selfFirstName = $selfuser->getFirstName();
        $selfLastName = $selfuser->getLastName();
        $selfMail=$selfuser->getEmail();
        $groupList=$this->get('ldap_list_group');
        $partieATronquer = '/^GRP_APP_(.+)$/';
        $groupListSoftware= array();
        $groupArray=$groupList->listGroup();
        
        foreach($groupArray as $group){
           if (preg_match( $partieATronquer, $group) === 1) {
               preg_match($partieATronquer, $group, $matches);
               $groupListSoftware[]=$matches[1];
           }
        }

        $formBuilder = $this->get('form.factory')->createBuilder('form', $groupListSoftware);
        $formBuilder
                ->add('Logiciel', 'choice', ['choices' => $groupListSoftware ])
                ->add('Commentaire',       'textarea')
                ->add('Valider',             'submit')
         ;
            
        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $varComments = $form->get('Commentaire')->getData();
            $var = $form->get('Logiciel')->getData();
            $listSoftware=$groupListSoftware[$var];
            $suffixeSoftware='GRP_APP_';
            $nomCompletSoftware=$suffixeSoftware.$listSoftware;
            $UserContainer =  $this->container->get('fos_user.user_manager');
            $em = $this->getDoctrine()->getManager();
            $em->persist($selfuser);
            $UserContainer->updateUser($selfuser);
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            $requestRoleRequest=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\RoleRequest")->find(1);
            $requestGroup=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\Group")->findOneByName($nomCompletSoftware);
            $request1 = new RequestSend;
            $request1->setRequestor($selfuser);
            $request1->setRoleRequest($requestRoleRequest);
            $request1->setGroup($requestGroup);
            $request1->setComments($varComments);
            $request1->setUserConcerned($selfuser);
            $request1->setStatus("En attente");
            $em->persist($request1);
            $em->flush();
            
            $roleName=$requestRoleRequest->getRoleName();
            $sujet="Demande de ".$roleName;
            $message="La demande de ".$roleName." pour l'utilisateur ".$selfFirstName." ".$selfLastName." a bien été prise en compte";
            $requestManager = $this->container->get('ldap_send_mail');
            $sendMail = $requestManager->envoyerMail($selfMail,$sujet,$message);
            
            return $this->redirect($this->generateUrl('admcuser_software_request_created', array('id' => $selfuser->getId())));
        }

        return $this->render('ADMCUserBundle:User:requestSoftware.html.twig', array(
          'form' => $form->createView(),
        ));
    }
    
    /** 
    * Envoie une requete de demande de Lecteur réseau à la DSI
    * @param Request $request  
    * @author Guillaume Nardizzi
    */    
    public function requestNetworkAction(RequestForm $request){
        $selfuser = $this->getUser();
        $selfFirstName = $selfuser->getFirstName();
        $selfLastName = $selfuser->getLastName();
        $selfMail=$selfuser->getEmail();
        $groupList=$this->get('ldap_list_group');
        $partieATronquer = '/^GRP_DRV_(.+)$/';
        $groupListNetwork= array();
        $groupArray=$groupList->listGroup();
        
        foreach($groupArray as $group){
           if (preg_match( $partieATronquer, $group) === 1) {
               preg_match($partieATronquer, $group, $matches);
               $groupListNetwork[]=$matches[1];
           }
        }
                
        $formBuilder = $this->get('form.factory')->createBuilder('form', $groupListNetwork);
        $formBuilder
            ->add('Network', 'choice', ['choices' => $groupListNetwork ])
            ->add('Commentaire',       'textarea')
            ->add('Valider',             'submit')
         ;
        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $varComments = $form->get('Commentaire')->getData();
            $var = $form->get('Network')->getData();
            $listNetwork=$groupListNetwork[$var];
            $suffixeNetwork='GRP_DRV_';
            $nomCompletNetwork=$suffixeNetwork.$listNetwork;
            $UserContainer =  $this->container->get('fos_user.user_manager');
            $em = $this->getDoctrine()->getManager();
            $em->persist($selfuser);
            $UserContainer->updateUser($selfuser);
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            $requestRoleRequest=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\RoleRequest")->find(2);
            $requestGroup=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\Group")->findOneByName($nomCompletNetwork);
            $request1 = new RequestSend;
            $request1->setRequestor($selfuser);
            $request1->setRoleRequest($requestRoleRequest);
            $request1->setGroup($requestGroup);
            $request1->setComments($varComments);
            $request1->setStatus("En attente");
            $request1->setUserConcerned($selfuser);
            $em->persist($request1);
            $em->flush();
            
            $roleName=$requestRoleRequest->getRoleName();
            $sujet="Demande de ".$roleName;
            $message="La demande de ".$roleName." pour l'utilisateur ".$selfFirstName." ".$selfLastName." a bien été prise en compte";
            $requestManager = $this->container->get('ldap_send_mail');
            $sendMail = $requestManager->envoyerMail($selfMail,$sujet,$message);
            
            
            return $this->redirect($this->generateUrl('admcuser_network_request_created', array('id' => $selfuser->getId())));
        }
        else{
        return $this->render('ADMCUserBundle:User:requestNetwork.html.twig', array(
          'form' => $form->createView(),
        ));
        }
    }
    
    /** 
    * Affiche un message de confirmation de demande de logiciel
    * @author Guillaume Nardizzi
    */    
    public function requestSoftwareCreatedAction(){
        return $this->render('ADMCUserBundle:User:requestSoftwareCreated.html.twig');
    }

    /** 
    * Affiche un message de confirmation de demande de lecteur réseau
    * @author Guillaume Nardizzi
    */    
    public function requestNetworkCreatedAction(){
        return $this->render('ADMCUserBundle:User:requestNetworkCreated.html.twig');
    }
 
    /** 
    * Affiche la liste des requetes et raffraichit la page avec un appel Ajax à la base de données
    * @author Guillaume Nardizzi
    */    
    public function requestsview2Action(){
        return $this->render('ADMCUserBundle:User:requestsview2.html.twig');
    }

    /** 
    * consulte une requete en base et l'affiche  
    * @param ID $id
    * @author Guillaume Nardizzi
    */    
    public function consultRequestAction($id){
        $doctManager= $this->getDoctrine()->getManager();
        $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
        $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
        $request=$requestRepository->find($id);
        return $this->render('ADMCUserBundle:User:viewContentRequest.html.twig', array(
        'request'=>$request
        ));
    }

    /** 
    * Liste les requêtes en cours de l'utilisateur RH en cours
    * @param Request $request  
    * @author Guillaume Nardizzi
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
        return $this->render('ADMCUserBundle:User:requestList.html.twig', array('requetes'=>$requests
        ));
    }
    
    /** 
    * Annule une requête précédemment envoyée
    * @param ID $id  
    * @author Guillaume Nardizzi
    */    
    public function deleteRequestAction($id){

        $em = $this->getDoctrine()->getEntityManager();
        $request2 = $this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\User")->findAll();
        $request1 = $this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\Request")->find($id);
        $em->remove($request1);
        $em->flush();
        return $this->render('ADMCUserBundle:User:requestDeleted.html.twig');

    }
}
