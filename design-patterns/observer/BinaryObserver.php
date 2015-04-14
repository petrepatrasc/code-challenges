<?php

/**
 * Responds to a change event by transforming the subject
 * message into binary form.
 *
 * @package CodeChallenges\DesignPatterns\Observer
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class BinaryObserver extends AbstractObserver
{
    /**
     * Respond to the change event.
     */
    public function respondToNotification()
    {
        $decimalForm = $this->getSubject()->getInteger();
        $binaryForm = base_convert($decimalForm, 10, 2);

        echo "Binary form: {$binaryForm}" . PHP_EOL;
    }

}
