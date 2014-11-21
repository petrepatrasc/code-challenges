<?php


namespace petrepatrasc\KernelBundle\Listener;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class CatchExceptionsAsJsonListener
{

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $responseData = [
            'errorMessage' => $exception->getMessage(),
            'errorCode' => $exception->getCode()
        ];

        $response = new JsonResponse($responseData);
        $event->setResponse($response);

        $event->stopPropagation();
    }
} 