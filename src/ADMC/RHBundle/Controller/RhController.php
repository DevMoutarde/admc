<?php

namespace ADMC\RHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RhController extends Controller
{
    public function indexAction(){
        return $this->render('ADMCRHBundle:Rh:index.html.twig');
    }
}
