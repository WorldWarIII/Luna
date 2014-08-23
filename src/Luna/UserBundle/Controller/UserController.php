<?php

namespace Luna\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    public function listUsersAction()
    {
        $users = $this->container->get('fos_user.user_manager')->findUsers();
        return $this->render(
            'LunaUserBundle:User:list_users.html.twig',
            array("users" => $users)
        );
    }

    public function manageUserModulesAction()
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $modulesEntity = $em->getRepository('LunaUserBundle:Module')
                            ->findAllModules();

        foreach ($modulesEntity as $module) {

            $modules[$module->getName()] = [];

            foreach($module->getSubModules() as $subModule){
                $modules[$module->getName()][] =  $subModule->getName();
            }
        }

        $users = $this->container->get('fos_user.user_manager')->findUsers();

        return $this->render(
            'LunaUserBundle:Module:manage_modules.html.twig',
            array("users" => $users, "modules" => $modules)
        );
    }
}
