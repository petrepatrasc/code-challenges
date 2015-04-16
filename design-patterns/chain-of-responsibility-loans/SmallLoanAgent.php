<?php

/**
 * Approves small loans.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class SmallLoanAgent extends AbstractLoanAgent implements LoanAgentInterface
{
    /**
     * Get the maximum threshold that an agent is allowed to aprove.
     *
     * @return int
     */
    public function getThreshold()
    {
        return 5000;
    }

    /**
     * Approve a loan request.
     *
     * @param LoanRequest $loanRequest
     *
     * @return bool
     */
    public function approveLoan(LoanRequest $loanRequest)
    {
        if ($loanRequest->getAmount() < $this->getThreshold()) {
            echo 'Approved by Small Loan Agent.';

            return true;
        }

        return $this->getNextAgent()->approveLoan($loanRequest);
    }
}
