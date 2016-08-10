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
    
    public function requestsOwnListAction(RequestForm $request){
        $selfuser = $this->getUser();
        $formBuilder = $this->get('form.factory')->createBuilder('form', $selfuser);
        $formBuilder
          ->add('lastname',      'text')
          ->add('firstname',      'text')
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
              $requestdsi=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\RoleRequest")->find(3);
              $request1 = new RequestSend;
              $request1->setRequestor($selfuser);
              $request1->setRoleRequest($requestdsi);
              $request1->setComments('Merci de valider la modification  de l\utilisateur '.$selfuser->getUsername());
              $request1->setStatus("En attente");
              $em->persist($request1);
              $em->flush();
              return $this->render('ADMCUserBundle:User:requestsOwnList.html.twig', array(
                'form' => $form->createView(),
              ));
        }

        return $this->render('ADMCUserBundle:User:requestsOwnList.html.twig', array(
          'form' => $form->createView(),
        ));
 }
    
    public function requestsviewAction(){
        return $this->render('ADMCUserBundle:User:requestsview.html.twig');
    } 
    
    
    /////////////////////////////LOGICIEL--LOGICIEL--LOGICIEL--LOGICIEL--LOGICIEL--/////////////////////////////////////////////////////
    public function requestSoftwareAction(RequestForm $request){
        $selfuser = $this->getUser();
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
                    ->add('Valider',             'submit')

             ;
            
            $form = $formBuilder->getForm();
            $form->handleRequest($request);
            
            if ($form->isValid()) {
                
                $var = $form->get('Logiciel')->getData();
                if ($var==0){
                    $currentSoftware='Notepad';
                }

                $UserContainer =  $this->container->get('fos_user.user_manager');
                $em = $this->getDoctrine()->getManager();
                $em->persist($selfuser);
                $UserContainer->updateUser($selfuser);
                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
                $requestdsi=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\RoleRequest")->find(1);
                $request1 = new RequestSend;
                $request1->setRequestor($selfuser);
                $request1->setRoleRequest($requestdsi);
                $request1->setComments('Demande de logiciel '.$currentSoftware.'de l\utilisateur '.$selfuser->getUsername());
                $request1->setStatus("En attente");
                $em->persist($request1);
                $em->flush();
                return $this->redirect($this->generateUrl('admcuser_software_request_created', array('id' => $selfuser->getId())));
            }

            return $this->render('ADMCUserBundle:User:requestSoftware.html.twig', array(
              'form' => $form->createView(),
            ));
    }
    
    
    ////////////////////////NETWORK--NETWORK--NETWORK--NETWORK--NETWORK--NETWORK--//////////////////////////////////
    public function requestNetworkAction(RequestForm $request){
        $selfuser = $this->getUser();
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
                ->add('Valider',             'submit')
             ;
            $form = $formBuilder->getForm();
            $form->handleRequest($request);
            

            if ($form->isValid()) {
                
                $var = $form->get('Network')->getData();
                if ($var==0){
                    $currentNetwork='Comptabilité';
                }
                elseif ($var==1) {
                    $currentNetwork='RH';
                }
                
                
                $UserContainer =  $this->container->get('fos_user.user_manager');
                $em = $this->getDoctrine()->getManager();
                $em->persist($selfuser);
                $UserContainer->updateUser($selfuser);
                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
                $requestdsi=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\RoleRequest")->find(2);
                $request1 = new RequestSend;
                $request1->setRequestor($selfuser);
                $request1->setRoleRequest($requestdsi);
                $request1->setComments('Demande de lecteur réseau '.$currentNetwork.' de l\utilisateur '.$selfuser->getUsername());
                $request1->setStatus("En attente");
                $em->persist($request1);
                $em->flush();
                return $this->redirect($this->generateUrl('admcuser_network_request_created', array('id' => $selfuser->getId())));
            }
            else{
            return $this->render('ADMCUserBundle:User:requestNetwork.html.twig', array(
              'form' => $form->createView(),
            ));
            }
    }
    
    public function requestSoftwareCreatedAction(){
        return $this->render('ADMCUserBundle:User:requestSoftwareCreated.html.twig');
    }
    
    public function requestNetworkCreatedAction(){
        return $this->render('ADMCUserBundle:User:requestNetworkCreated.html.twig');
    }
}
