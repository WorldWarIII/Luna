<?php

namespace Luna\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LunaApplicationBundle:Default:index.html.twig', array('name' => $name));
    }
}
