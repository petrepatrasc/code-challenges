<?php


namespace petrepatrasc\AuthenticationBundle\Security;


use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\Reference;

class OauthFactory implements SecurityFactoryInterface
{
    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint)
    {
        $providerId = 'petrepatrasc.auth.oauth.provider.' . $id;

        $container->setDefinition($providerId, new DefinitionDecorator('petrepatrasc.auth.oauth.provider'))
            ->replaceArgument(0, new Reference($userProvider));

        $listenerId = 'petrepatrasc.auth.oauth.listner.' . $id;
        $listener = $container->setDefinition($listenerId, new DefinitionDecorator('petrepatrasc.auth.oauth.listener'));

        return [$providerId, $listenerId, $defaultEntryPoint];
    }

    public function getPosition()
    {
        return 'pre_auth';
    }

    public function getKey()
    {
        return 'custom_oauth';
    }

    public function addConfiguration(NodeDefinition $builder)
    {

    }

} 