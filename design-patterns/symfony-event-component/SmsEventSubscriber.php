<?php

/**
 * Implements an SMS notification.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class SmsEventSubscriber extends AbstractEventSubscriber implements EventSubscriberInterface
{
    /**
     * Respond to a particular event.
     *
     * @param AbstractEvent $event
     *
     * @return AbstractEvent
     */
    public function respondToEvent(AbstractEvent $event)
    {
        if (!$event instanceof NotificationEvent) {
            throw new \InvalidArgumentException("Event should be of type Notification Event.");
        }

        $message = $event->getMessage();
        echo "Sending SMS with message '{$message}'." . PHP_EOL;

        $this->getEventDispatcher()->preventPropagation();
    }

}
