<?php

namespace Luna\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SettingsController extends Controller
{
    public function indexAction()
    {
        return $this->render('LunaApplicationBundle:Settings:index.html.twig');
    }
}
