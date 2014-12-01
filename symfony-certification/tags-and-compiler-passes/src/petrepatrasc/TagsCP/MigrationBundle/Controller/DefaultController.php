<?php

namespace petrepatrasc\TagsCP\MigrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TagsCPMigrationBundle:Default:index.html.twig', array('name' => $name));
    }
}
