<?php

namespace RACDevelopment\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RACDevelopmentUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
