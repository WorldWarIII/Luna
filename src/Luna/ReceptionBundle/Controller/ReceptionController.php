<?php

namespace Luna\ReceptionBundle\Controller;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations;

class ReceptionController extends Controller
{
    public function homeAction()
    {

//        $modules = array();
//        $user = $this->get('security.context')->getToken()->getUser();
//
//        foreach($user->getRoles() as $role){
//         array_push($modules, str_replace('ROLE_', '' ,$role));
//        }
//        var_dump($modules);

        $em = $this->get('doctrine')->getEntityManager();
        $modules = $em->getRepository('Luna\UserBundle\Entity\Module')->findAllSubModules(1);

        return $this->render(
            'LunaReceptionBundle:Reception:home.html.twig',
            array("modules" => $modules)
        );
    }

}
