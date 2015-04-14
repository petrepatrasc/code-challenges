<?php

/**
 * Governs Event Subscribers.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
abstract class AbstractEventSubscriber
{
    /** @var EventDispatcher */
    protected $eventDispatcher;

    /** @var int */
    protected $priority;

    public function __construct($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return EventDispatcher
     */
    public function getEventDispatcher()
    {
        return $this->eventDispatcher;
    }

    /**
     * @param EventDispatcher $eventDispatcher
     *
     * @return $this
     */
    public function setEventDispatcher($eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     *
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }
}
