<?php

namespace petrepatrasc\AuthenticationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('petrepatrascAuthenticationBundle:Default:index.html.twig', array('name' => $name));
    }
}
