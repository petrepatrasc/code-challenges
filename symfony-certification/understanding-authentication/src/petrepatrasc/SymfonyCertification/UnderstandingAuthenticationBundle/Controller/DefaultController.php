<?php

namespace petrepatrasc\SymfonyCertification\UnderstandingAuthenticationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('petrepatrascSymfonyCertificationUnderstandingAuthenticationBundle:Default:index.html.twig', array('name' => $name));
    }
}
