<?php

namespace ADMC\RHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request as RequestForm;
use ADMC\CoreBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use \ADMC\CoreBundle\Entity\Request as RequestSend;




class RhController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADMCRHBundle:Default:index.html.twig');
    }
    
        public function menuAction(){

        $subtitle="Menu RH";
        $list=array(
            array('link'=>$this->get('router')->generate('admcrh_request_list'), 'name'=>'Liste des demandes en cours'),
            array('link'=>$this->get('router')->generate('admcrh_create_user'), 'name'=>'Créer utilisateur')
        );
        return $this->render('ADMCRHBundle:RH:menu.html.twig', array('subtitle'=>$subtitle,'menu'=>$list
        ));  
    }
    
        public function requestsviewAction(){
             return $this->render('ADMCRHBundle:Rh:requestsview.html.twig');
        }  
    
        public function requestListAction(RequestForm $request){

            $doctManager= $this->getDoctrine()->getManager();
            $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
            $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
            $requests=$requestRepository->findByStatus("En attente");
            return $this->render('ADMCRHBundle:Rh:requestList.html.twig', array('requetes'=>$requests
            ));
        }
        
        public function processedviewAction(){
            return $this->render('ADMCRHBundle:Rh:processedView.html.twig');
        }
        
        public function processedListAction(RequestForm $request){
            $doctManager= $this->getDoctrine()->getManager();
            $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
            $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
            $requests=$requestRepository->findByStatus(array('Validée', 'Refusée'));

            return $this->render('ADMCRHBundle:Rh:processedList.html.twig', array('requetes'=>$requests
            ));
        }
        
        public function consultRequestAction($id){
            $doctManager= $this->getDoctrine()->getManager();
            $requestorRepository=$doctManager->getRepository('ADMCCoreBundle:User')->findAll();
            $requestRepository=$doctManager->getRepository('ADMCCoreBundle:Request');
            $request=$requestRepository->find($id);
            return $this->render('ADMCRHBundle:Rh:viewContentRequest.html.twig', array(
            'request'=>$request
            ));
        }
        
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
        
        public function createUserAction(Request $request) {
            $user= new User();
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
                  $user->setUsername($user->getFirstName());
                  $user->setUsernameCanonical($user->getUsername());
                  $user->setPassword("pass");
                  $em->persist($user);
                  $UserContainer->updateUser($user);
                  $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
                  return $this->redirect($this->generateUrl('admcrh_user_created', array('id' => $user->getId())));
                }
            return $this->render('ADMCRHBundle:Rh:createUser.html.twig', array(
              'form' => $form->createView(),
            ));
        }
        
//        public function requestAction(){
//
//            $manager = $this->getDoctrine()->getManager();
//            $request = new Request;
//            $request->setRequestor($userRequestor);
//            $request->setRoleRequest($roleRequest);
//            $request->setGroup($group);
//            $request->setComments('Merci de m\'ajouter le logiciel x');
//            $manager->persist($request);
//            $manager->flush();
//            return $this->render('ADMCUserBundle:Rh:request.html.twig');
//        }
        
        public function userCreatedAction(){
            return $this->render('ADMCRHBundle:Rh:userCreated.html.twig');
        }


    
}
