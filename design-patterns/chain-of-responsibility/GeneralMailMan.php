<?php

/**
 * Class GeneralMailMan
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class GeneralMailMan extends AbstractMailman
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

        if ($postcode > 0) {
            return 'Picked up by General Mailman.';
        }

        if ($this->getNextMailman()) {
            return $this->getNextMailman()->deliverMessage($message);
        }

        return null;
    }

}
