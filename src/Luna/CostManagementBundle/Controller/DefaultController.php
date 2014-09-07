<?php

namespace Luna\CostManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LunaCostManagementBundle:Default:index.html.twig', array('name' => $name));
    }
}
