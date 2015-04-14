<?php

/**
 * Sends email notification.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class EmailNotificationSubscriber extends AbstractEventSubscriber implements EventSubscriberInterface
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

        echo "Sending email with message '{$message}'." . PHP_EOL;
    }

}
