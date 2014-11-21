<?php


namespace petrepatrasc\KernelBundle\Listener;


use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class EnsureResponseHeader
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $event->getResponse()->headers->set('PP-Sudoku-Result', '746853192238196745591427638814639257367285419952741863629374581185962374473518926');
    }
} 