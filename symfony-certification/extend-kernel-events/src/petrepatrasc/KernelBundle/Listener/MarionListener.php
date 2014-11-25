<?php


namespace petrepatrasc\KernelBundle\Listener;


use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

class MarionListener
{
    public function marionFixer(GetResponseForControllerResultEvent $event)
    {
        $response = $event->getControllerResult();

        if (is_array($response) && array_key_exists('name', $response)) {
            $response['name'] = str_replace('Marion', 'Banana', $response['name']);
            $event->setControllerResult($response);
        }
    }
} 