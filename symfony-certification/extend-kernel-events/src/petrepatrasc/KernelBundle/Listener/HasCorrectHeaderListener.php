<?php


namespace petrepatrasc\KernelBundle\Listener;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class HasCorrectHeaderListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        $path = $event->getRequest()->getPathInfo();
        if (0 !== strpos($path, '/api/user-check')) {
            $developmentToken = $event->getRequest()->headers->get('development');

            if ('1457' !== $developmentToken) {
                $response = new Response(
                    'Invalid header specified',
                    503
                );
                $event->setResponse($response);
            }
        }
    }
} 