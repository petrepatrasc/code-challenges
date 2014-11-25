<?php

namespace petrepatrasc\KernelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name = 'Petre')
    {
        return [
            'name' => 'Hello Marion!'
        ];
    }

    public function noAuthenticationHeaderAction()
    {
        return [
            'errorMessage' => 'No authentication header provided',
            'errorCode' => 103
        ];
    }
}
