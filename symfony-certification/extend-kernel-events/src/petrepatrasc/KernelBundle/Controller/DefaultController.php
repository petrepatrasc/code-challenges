<?php

namespace petrepatrasc\KernelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name = 'Petre')
    {
        return $this->render('petrepatrascKernelBundle:Default:index.html.twig', array('name' => $name));
    }

    public function authenticationHeaderInvalidAction()
    {
        return new Response('Invalid authentication header', 200);
    }
}
