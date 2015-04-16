<?php

/**
 * Class AbstractLoanAgent
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
abstract class AbstractLoanAgent
{
    /**
     * @var AbstractLoanAgent
     */
    protected $nextAgent;

    /**
     * Approve a loan request.
     *
     * @param LoanRequest $loanRequest
     *
     * @return mixed
     */
    abstract public function approveLoan(LoanRequest $loanRequest);

    /**
     * @return AbstractLoanAgent
     */
    public function getNextAgent()
    {
        return $this->nextAgent;
    }

    /**
     * @param AbstractLoanAgent $nextAgent
     *
     * @return $this
     */
    public function setNextAgent($nextAgent)
    {
        $this->nextAgent = $nextAgent;

        return $this;
    }
}
