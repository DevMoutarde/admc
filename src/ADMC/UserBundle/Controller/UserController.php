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
        $selfuser = $this->getUser(); // retourne l'objet de l'utilisateur en cours
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
    
    public function requestSoftwareAction(RequestForm $request){
        
        $groupSoftware=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\Group")->findBy(array());
        
        $groupArray=array();
        foreach($groupSoftware as $group){
            $groupArray[]=$group->getName();
        }

        $nomSoftware=array();
        $partieATronquer = '/^GRP_APP_(.+)$/';
        foreach($groupArray as $group){
            if (preg_match( $partieATronquer, $group) === 1) {
                preg_match($partieATronquer, $group, $matches);
                $nomSoftware[]=$matches[1];
            }
        }
        dump($nomSoftware); 
        
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
//        $group=new group();
//        $formBuilder = $this->get('form.factory')->createBuilder('form', $group);
//        

//        $formBuilder
//               ->add($nomSoftware,      'array')
//
//        
//        $form->handleRequest($group1);
        
        

        return $this->render('ADMCUserBundle:User:requestSoftware.html.twig');
    }
    
    public function requestNetworkAction(){
        
        $groupSoftware=$this->getDoctrine()->getRepository("\ADMC\CoreBundle\Entity\Group")->findBy(array());
        
        $groupArray=array();
        foreach($groupSoftware as $group){
            $groupArray[]=$group->getName();
        }

        $nomNetwork=array();
        $partieATronquer = '/^GRP_DRV_(.+)$/';
        foreach($groupArray as $group){
            if (preg_match( $partieATronquer, $group) === 1) {
                preg_match($partieATronquer, $group, $matches);
                $nomNetwork[]=$matches[1];
            }
        }
        dump($nomNetwork);
        return $this->render('ADMCUserBundle:User:requestNetwork.html.twig');
    }
    
}
