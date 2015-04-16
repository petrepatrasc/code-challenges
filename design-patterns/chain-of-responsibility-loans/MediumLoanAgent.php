<?php

/**
 * Approves medium loans.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class MediumLoanAgent extends AbstractLoanAgent implements LoanAgentInterface
{
    /**
     * Approve a loan request.
     *
     * @param LoanRequest $loanRequest
     *
     * @return mixed
     */
    public function approveLoan(LoanRequest $loanRequest)
    {
        if ($loanRequest->getAmount() < $this->getThreshold()) {
            echo 'Approved by Medium Loan Agent.';

            return true;
        }

        return $this->getNextAgent()->approveLoan($loanRequest);
    }

    /**
     * Get the maximum threshold that an agent is allowed to aprove.
     *
     * @return int
     */
    public function getThreshold()
    {
        return 10000;
    }

}
