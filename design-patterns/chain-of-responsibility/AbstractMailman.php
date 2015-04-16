<?php

/**
 * Defines a mailman and the thresholds between postcodes.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
abstract class AbstractMailman
{
    const THRESHOLD_VALUE = 100;

    /**
     * @var integer
     */
    protected $threshold = self::THRESHOLD_VALUE;

    /**
     * @var AbstractMailman
     */
    protected $nextMailman;

    /**
     * Deliver the message.
     *
     * @param Message $message
     *
     * @return mixed
     */
    abstract public function deliverMessage(Message $message);

    /**
     * @return int
     */
    public function getThreshold()
    {
        return $this->threshold;
    }

    /**
     * @return AbstractMailman
     */
    public function getNextMailman()
    {
        return $this->nextMailman;
    }

    /**
     * @param AbstractMailman $nextMailman
     *
     * @return $this
     */
    public function setNextMailman($nextMailman)
    {
        $this->nextMailman = $nextMailman;

        return $this;
    }
}
