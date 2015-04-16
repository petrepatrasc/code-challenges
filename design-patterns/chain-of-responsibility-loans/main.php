<?php

spl_autoload_register(function ($class) {
    include_once $class . '.php';
});

$smallLoanAgent = new SmallLoanAgent();
$mediumLoanAgent = new MediumLoanAgent();
$loanManager = new LoanManager();

$smallLoanAgent->setNextAgent($mediumLoanAgent);
$mediumLoanAgent->setNextAgent($loanManager);

$seedData = [
    300.25,
    4000.75,
    6000.55,
    8000.90,
    15000.00
];

foreach ($seedData as $datum) {
    $loanRequest = new LoanRequest();
    $loanRequest->setAmount($datum);

    echo "Approving loan for the value of \${$loanRequest->getAmount()} ..." . PHP_EOL;
    $loanApproved = $smallLoanAgent->approveLoan($loanRequest);

    if (!$loanApproved) {
        echo 'Loan has not been approved.' . PHP_EOL;
    } else {
        echo PHP_EOL;
    }
}
