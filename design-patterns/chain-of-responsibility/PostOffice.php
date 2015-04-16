<?php


class PostOffice extends AbstractMailman
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
        if ($this->getNextMailman()) {
            $messageDelivered = $this->getNextMailman()->deliverMessage($message);

            if (null !== $messageDelivered) {
                return $messageDelivered;
            }
        }

        return 'Nobody picked up the message.';
    }

}
