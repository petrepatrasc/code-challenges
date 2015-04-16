<?php

/**
 * Class LoanRequest
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class LoanRequest
{

    /**
     * @var float
     */
    protected $amount;

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }


}
