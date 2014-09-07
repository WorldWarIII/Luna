<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 8/17/14
 * Time: 11:23 AM
 */

namespace Luna\ApplicationBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class Builder
{
    private $factory;
    private $securityContext;

    /**
     * @param FactoryInterface $factory
     * @param SecurityContext $securityContext
     */
    public function __construct(FactoryInterface $factory, SecurityContext $securityContext)
    {
        $this->factory         = $factory;
        $this->securityContext = $securityContext;
    }

    public function createMainMenu(Request $request)
    {
        $user = $this->securityContext->getToken()->getUser();
        $modules = $user->getUserModules();

        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav nav-sidebar');


        foreach($modules as $module){
            if($module->getModule()->getParent() != 0)
                continue;
            $menu->addChild($module->getModule()->getName(),
                        array('route' => $module->getModule()->getRoute())
            );
        }

        return $menu;
    }


    public function createSubMenu(Request $request)
    {
        $user = $this->securityContext->getToken()->getUser();

        $menu = $this->factory->createItem('root');

        $menu->addChild('SubHome', array('route' => 'luna_home'));
        // ... add more children

        return $menu;
    }

}