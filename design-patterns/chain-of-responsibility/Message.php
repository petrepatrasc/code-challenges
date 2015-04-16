<?php

/**
 * Holds a message that needs to be distributed in a specific postcode.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class Message
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @var int
     */
    protected $postcode;

    function __toString()
    {
        return "Content: '{$this->getMessage()}', Postcode: {$this->getPostcode()}";
    }

    /**
     * @return int
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param int $postcode
     *
     * @return $this
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
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
