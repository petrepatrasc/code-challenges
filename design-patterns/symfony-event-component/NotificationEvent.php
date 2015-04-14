<?php

/**
 * Notification event holds a message.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class NotificationEvent extends AbstractEvent
{

    /** @var string */
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
