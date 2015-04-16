<?php

/**
 * Class SouthMailMan
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class SouthMailman extends AbstractMailman
{
    /**
     * Deliver the message.
     *
     * @param Message $message
     *
     * @return mixed
     */
    public function deliverMessage(Message $message)
    {
        $postcode = $message->getPostcode();

        if ($postcode > 9000) {
            return 'Picked up by South Mailman.';
        }

        if ($this->getNextMailman()) {
            return $this->getNextMailman()->deliverMessage($message);
        }

        return null;
    }

}
