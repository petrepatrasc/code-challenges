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
                'noAuthenticationHeaderAction'
            ];

            $event->setController($controller);
            $event->stopPropagation();
            return;
        }

        if ('apiKeyTest' !== $authToken) {
            throw new \Exception('Invalid API key provided', 104);
        }
    }
} 