<?php

namespace Luna\ReceptionBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Luna\ApplicationBundle\DependencyInjection\Compiler\LunaRepositoryCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class LunaReceptionBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new LunaRepositoryCompilerPass());
    }
}
