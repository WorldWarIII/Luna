<?php

namespace Luna\ApplicationBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class LunaRepositoryCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('doctrine.orm.default_entity_manager');

        $taggedServices = $container->findTaggedServiceIds('nab.repository');

        foreach ($taggedServices as $id => $attributes) {
            $definition = $container->getDefinition($id);

            // if(!is_subclass_of($definition->getClass(), 'Nab\CommonBundle\Repository\CommonRepository'))
            //     throw new \LogicException(sprintf('Repository "%s" needs to implement "Nab\CommonBundle\Repository\CommonRepository"', $definition->getClass()));                

            $definition->addMethodCall('addEntityManager', [new Reference('doctrine.orm.default_entity_manager')]);
            $definition->addMethodCall('addRepository');

        }
    }
}