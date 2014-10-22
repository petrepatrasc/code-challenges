<?php

namespace petrepatrasc\SymfonyCertification\UnderstandingAuthenticationBundle;

use petrepatrasc\SymfonyCertification\UnderstandingAuthenticationBundle\Factory\OauthFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class petrepatrascSymfonyCertificationUnderstandingAuthenticationBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $extension = $container->getExtension('security');
        $extension->addSecurityListenerFactory(new OauthFactory());
    }
}
