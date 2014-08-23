<?php

namespace Luna\ReceptionBundle\Controller;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations;

class DashboardController extends Controller
{
    public function homeAction(Request $request)
    {
//        $modules = array();
//        $user = $this->get('security.context')->getToken()->getUser();
//
//        foreach($user->getRoles() as $role){
//         array_push($modules, str_replace('ROLE_', '' ,$role));
//        }
//        var_dump($modules);
        return $this->render(
            'LunaReceptionBundle:Dashboard:home.html.twig',
            array()
        );
    }

}
