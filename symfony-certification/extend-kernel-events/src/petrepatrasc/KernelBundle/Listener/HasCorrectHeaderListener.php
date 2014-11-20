<?php


namespace petrepatrasc\KernelBundle\Listener;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class HasCorrectHeaderListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        $requestHeaders = $event->getRequest()->headers;

        if ('1457' !== $requestHeaders->get('development')) {
            $response = new Response(
                'Invalid header specified',
                503
            );
            $event->setResponse($response);
        }
    }
} 