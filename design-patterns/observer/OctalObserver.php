<?php

/**
 * Responds to a change event by transforming the subject
 * message into binary form.
 *
 * @package CodeChallenges\DesignPatterns\Observer
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class OctalObserver extends AbstractObserver
{
    /**
     * Respond to the change event.
     */
    public function respondToNotification()
    {
        $decimalForm = $this->getSubject()->getInteger();
        $octalForm = base_convert($decimalForm, 10, 8);

        echo "Octal form: {$octalForm}" . PHP_EOL;
    }

}
