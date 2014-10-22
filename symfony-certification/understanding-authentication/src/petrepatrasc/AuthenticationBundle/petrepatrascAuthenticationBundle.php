<?php

namespace petrepatrasc\AuthenticationBundle;

use petrepatrasc\AuthenticationBundle\Security\OauthFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class petrepatrascAuthenticationBundle extends Bundle
{
    public function build(ContainerBuilder $container) {
        parent::build($container);

        $extension = $container->getExtension('security');
        $extension->addSecurityListenerFactory(new OauthFactory());
    }
}
