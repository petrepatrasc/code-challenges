<?php

namespace petrepatrasc\AuthenticationBundle\Controller;

use petrepatrasc\AuthenticationBundle\Entity\OauthUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('petrepatrascAuthenticationBundle:Default:index.html.twig', array('name' => $name));
    }

    public function generateDataAction()
    {
        $username = $this->generateRandomString(10);
        $password = 'test';
        $salt = $this->generateRandomString(3);

        $testUser = new OauthUser($username, 'test', $salt, ['ROLE_USER']);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($testUser);
        $manager->flush();

        return new Response("User {$username}, with password {$password} and salt {$salt} has been generated!");
    }

    public function secondaryFirewallAction($name)
    {
        return $this->render('petrepatrascAuthenticationBundle:Default:index.html.twig', array('name' => $name));
    }

    protected function generateRandomString($length = 10)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}
