<?php


namespace petrepatrasc\KernelBundle\Listener;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

class JsonEncryptionListener
{
    public function jsonEncryption(GetResponseForControllerResultEvent $event)
    {
        if (is_array($event->getControllerResult())) {
            $response = new JsonResponse($event->getControllerResult());
            $event->setResponse($response);
        }
    }
} 