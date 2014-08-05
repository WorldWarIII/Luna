<?php

namespace Luna\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LunaUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
