<?php

namespace ADMC\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ADMCCoreBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
