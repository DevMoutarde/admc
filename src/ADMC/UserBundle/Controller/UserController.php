<?php

namespace ADMC\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction(){
        return $this->render('ADMCUserBundle:User:index.html.twig');
    }
}
