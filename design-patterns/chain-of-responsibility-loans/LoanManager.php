<?php

/**
 * Approves large loans.
 *
 * @author Petre Pătrașc <petre@dreamlabs.ro>
 */
class LoanManager extends AbstractLoanAgent
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
        echo 'Approved by Loan Manager.';
        return true;
    }
}
