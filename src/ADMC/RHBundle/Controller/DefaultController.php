<?php

namespace ADMC\RHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADMCRHBundle:Default:index.html.twig');
    }
}
