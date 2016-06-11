<?php

namespace ADMC\DSIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADMCDSIBundle:Default:index.html.twig');
    }
}
