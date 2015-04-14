<?php

/**
 * Represents a notification source/topic that signals
 * a change event to all of the registered Observers.
 *
 * @package CodeChallenges\DesignPatterns\Observer
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class Subject
{
    /**
     * @var integer
     */
    protected $integer;

    /**
     * @var array
     */
    protected $observers;

    /**
     * @param int $integer
     *
     * @return $this
     */
    public function setInteger($integer)
    {
        $this->integer = $integer;
        $this->notifyAll();

        return $this;
    }

    /**
     * Attach an Observer to the Subject.
     *
     * @param AbstractObserver $observer
     *
     * @return array
     */
    public function attachObserver(AbstractObserver $observer)
    {
        $this->observers[] = $observer;
        $observer->setSubject($this);

        return $this->getObservers();
    }

    /**
     * Notify all of the Observers of the change event.
     */
    protected function notifyAll()
    {
        /** @var AbstractObserver $observer */
        foreach ($this->getObservers() as $observer) {
            $observer->respondToNotification();
        }
    }

    /**
     * @return array
     */
    public function getObservers()
    {
        return $this->observers;
    }

    /**
     * @return int
     */
    public function getInteger()
    {
        return $this->integer;
    }
}
