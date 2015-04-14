<?php

/**
 * Governs the Observer implementations.
 *
 * @package CodeChallenges\DesignPatterns\Observer
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
abstract class AbstractObserver
{
    /**
     * @var Subject
     */
    protected $subject;

    /**
     * Respond to the change event.
     */
    abstract public function respondToNotification();

    /**
     * @return Subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param Subject $subject
     *
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }
}
