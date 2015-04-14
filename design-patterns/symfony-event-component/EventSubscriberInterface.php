<?php


interface EventSubscriberInterface
{
    /**
     * Respond to a particular event.
     *
     * @param AbstractEvent $event
     *
     * @return AbstractEvent
     */
    public function respondToEvent(AbstractEvent $event);
}
