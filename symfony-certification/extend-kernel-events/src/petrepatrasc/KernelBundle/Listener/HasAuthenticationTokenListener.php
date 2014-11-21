<?php


namespace petrepatrasc\KernelBundle\Listener;


use Guzzle\Http\Client;
use petrepatrasc\KernelBundle\Controller\DefaultController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class HasAuthenticationTokenListener
{
    public function onKernelController(FilterControllerEvent $event)
    {
        $authToken = $event->getRequest()->headers->get('authentication');

        if (null === $authToken) {
            $controller = [
                new DefaultController(),
                'authenticationHeaderInvalidAction'
            ];

            $event->setController($controller);
            $event->stopPropagation();
        }

        if ('apiKeyTest' !== $authToken) {
            throw new \Exception('Invalid API key provided', 104);
        }
    }
} 