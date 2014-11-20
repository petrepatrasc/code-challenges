<?php

namespace petrepatrasc\KernelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('petrepatrascKernelBundle:Default:index.html.twig', array('name' => $name));
    }
}
