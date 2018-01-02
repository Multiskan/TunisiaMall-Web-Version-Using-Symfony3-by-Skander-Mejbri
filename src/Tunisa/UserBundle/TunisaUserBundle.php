<?php

namespace Tunisa\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TunisaUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
