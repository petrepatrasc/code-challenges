<?php

class HardshadNumber
{
    public function generateHarshadNumbersToLimit($limit, $start = 1)
    {
        $harshadNumbers = array();

        for ($iterator = $start; $iterator <= $limit; $iterator++) {
            if ($this->checkIfNumberIsHarshad($iterator)) {
                $harshadNumbers[] = $iterator;
            }
        }

        return $harshadNumbers;
    }

    /**
     * @param string $number Check if a particular number is a Harshad number.
     * @return bool
     */
    public function checkIfNumberIsHarshad($number)
    {
        $sumOfDigits = array_sum(str_split($number));

        return ($number % $sumOfDigits == 0) ? true : false;
    }
}

$harshadClass = new HardshadNumber();
$numbers = $harshadClass->generateHarshadNumbersToLimit(10000);

foreach ($numbers as $number) {
    echo $number . PHP_EOL;
}