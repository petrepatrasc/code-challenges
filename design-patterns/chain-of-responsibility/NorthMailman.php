<?php

/**
 * Class NorthMailman
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class NorthMailman extends AbstractMailman
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

        if ($postcode > 3000 && $postcode < 4000) {
            return 'Picked up by North Mailman.';
        }

        if ($this->getNextMailman()) {
            return $this->getNextMailman()->deliverMessage($message);
        }

        return null;
    }


}
