<?php

/**
 * Event Dispatcher that notifies all of the Event Subscribers.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class EventDispatcher
{
    /**
     * @var array
     */
    protected $subscribers;

    /**
     * @var bool
     */
    protected $stopPropagation = false;

    /**
     * Attach an event subscriber to a particular event name trigger.
     *
     * @param string                  $eventName
     * @param AbstractEventSubscriber $eventSubscriber
     *
     * @return $this
     */
    public function attachEventSubscriber($eventName, AbstractEventSubscriber $eventSubscriber)
    {
        $eventSubscriber->setEventDispatcher($this);
        $this->subscribers[$eventName][] = $eventSubscriber;

        $this->subscribers[$eventName] = $this->sortPriorityOfEventSubscribers($this->subscribers[$eventName]);

        return $this;
    }

    /**
     * Dispatch an event.
     *
     * @param string        $eventName
     * @param AbstractEvent $eventEntity
     *
     * @return AbstractEvent
     */
    public function dispatch($eventName, AbstractEvent $eventEntity = null)
    {
        if (!array_key_exists($eventName, $this->subscribers)) {
            throw new \LogicException("No event subscribers for the '{$eventName}' event.");
        }
        $this->allowPropagationOfEvents();

        /** @var AbstractEventSubscriber $subscriber */
        foreach ($this->subscribers[$eventName] as $subscriber) {
            if (true === $this->stopPropagation) {
                echo 'Stopping propagation of events.' . PHP_EOL;
                break;
            }

            $subscriber->respondToEvent($eventEntity);
        }

        return $eventEntity;
    }

    /**
     * Sort event subscribers by priority.
     *
     * @param array $eventSubscribers
     *
     * @return array
     */
    protected function sortPriorityOfEventSubscribers(array $eventSubscribers)
    {
        usort($eventSubscribers, [$this, 'sortByPriority']);

        return $eventSubscribers;
    }

    /**
     * Sort two event subscribers based on their priority.
     *
     * @param AbstractEventSubscriber $leftHand
     * @param AbstractEventSubscriber $rightHand
     *
     * @return bool
     */
    protected function sortByPriority(AbstractEventSubscriber $leftHand, AbstractEventSubscriber $rightHand)
    {
        return $leftHand->getPriority() < $rightHand->getPriority();
    }

    /**
     * Prevent propagation to other Event Subscribers.
     *
     * @return $this
     */
    public function preventPropagation()
    {
        $this->stopPropagation = true;

        return $this;
    }

    /**
     * Allow propagation to other Event Subscribers.
     *
     * @return $this
     */
    public function allowPropagationOfEvents()
    {
        $this->stopPropagation = false;

        return $this;
    }
}
