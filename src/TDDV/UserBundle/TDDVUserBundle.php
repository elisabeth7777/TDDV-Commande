<?php

namespace TDDV\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TDDVUserBundle extends Bundle
{
    public function getParent()
    {
      return 'FOSUserBundle';
    }    
}
