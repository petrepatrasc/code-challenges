<?php

/**
 * Responds to a change event by transforming the subject
 * message into binary form.
 *
 * @package CodeChallenges\DesignPatterns\Observer
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class HexadecimalObserver extends AbstractObserver
{
    /**
     * Respond to the change event.
     */
    public function respondToNotification()
    {
        $decimalForm = $this->getSubject()->getInteger();
        $hexadecimalForm = base_convert($decimalForm, 10, 16);

        echo "Hexadecimal form: {$hexadecimalForm}" . PHP_EOL;
    }

}
