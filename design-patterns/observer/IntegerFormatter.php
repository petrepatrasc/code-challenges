<?php

/**
 * Formats an integer into multiple bases.
 *
 * @package CodeChallenges\DesignPatterns\Observer
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class IntegerFormatter
{
    /**
     * @var Subject
     */
    protected $subject;

    public function __construct()
    {
        $this->subject = new Subject();

        /* Set up Observers. */
        $binaryObserver      = new BinaryObserver();
        $octalObserver       = new OctalObserver();
        $hexadecimalObserver = new HexadecimalObserver();

        /* Attach the Observers. */
        $this->subject->attachObserver($binaryObserver);
        $this->subject->attachObserver($octalObserver);
        $this->subject->attachObserver($hexadecimalObserver);
    }

    /**
     * Format an integer into multiple bases by notifying the Observers.
     *
     * @param int $integer
     *
     * @return $this
     */
    public function formatToMultipleBases($integer)
    {
        $integer = intval($integer);
        echo "Decimal Form: {$integer}" . PHP_EOL;

        return $this->subject->setInteger($integer);
    }
}
