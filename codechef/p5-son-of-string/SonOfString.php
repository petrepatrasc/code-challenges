<?php

class SonOfString {

    public function __construct($string = '') {
        $this->problemString = $string;
    }

    protected $primeNumbers;

    protected $problemString;

    /**
     * @param string $problemString
     */
    public function setProblemString($problemString)
    {
        $this->problemString = $problemString;
    }

    /**
     * @return string
     */
    public function getProblemString()
    {
        return $this->problemString;
    }

    /**
     * Get prime numbers smaller than the size of the problem string.
     * @return array Array containing the prime numbers smaller than the size of the problem string.
     */
    public function getPrimeNumbersSmallerThanTheProblemString() {
        $limit = strlen($this->problemString);
        $primeNumbers = array_fill(2, $limit - 1, true);

        // Apply Eratostene.
        for ($position = 2; $position <= $limit / 2; $position++) {
            if ($primeNumbers[$position] !== false) {
                $multiplier = 2;
                $currentToken = $position * $multiplier;

                while ($currentToken <= $limit) {
                    $primeNumbers[$currentToken] = false;

                    $multiplier ++;
                    $currentToken = $position * $multiplier;
                }
            }
        }

        $dataToBeReturned = array();
        foreach($primeNumbers as $number => $primeValid) {
            if ($primeValid) {
                array_push($dataToBeReturned, $number);
            }
        }

        unset($primeNumbers);

        $this->primeNumbers = $dataToBeReturned;
        return $dataToBeReturned;
    }

    /**
     * Compute the greatest common divisor (highest common factor) between two numbers.
     * @param int $n The first number.
     * @param int $m The second number.
     * @return int|number The GCD of the two provided numbers.
     */
    public function computeGreatestCommonDivisor($n, $m) {
        $n = abs($n);
        $m = abs($m);

        if ($n==0 and $m==0)
            return 1; //avoid infinite recursion
        if ($n == $m and $n >= 1)
            return $n;
        return ($m < $n) ? $this->computeGreatestCommonDivisor($n - $m, $n)
            : $this->computeGreatestCommonDivisor($n, $m - $n);
    }

    /**
     * Compute the lowest common multiple between two numbers.
     * @param int $n The first number.
     * @param int $m The second number.
     * @return int The lowest common multiple between the two provided numbers.
     */
    public function computeLowestCommonMultiple($n, $m) {
        return $m * ($n / $this->computeGreatestCommonDivisor($n, $m - $n));
    }

    /**
     * Get a substring array with the prime indexes from the initial problem string.
     * @return array Array containing the values on the prime indexes from the problem string.
     */
    public function getPrimeIndexesFromProblemString() {
        $primeSubstring = array();

        foreach($this->primeNumbers as $index) {
            array_push($primeSubstring, (int) $this->problemString[$index - 1]);
        }

        return $primeSubstring;
    }

    /**
     * Compute the LCM of an array.
     * @param array $digits The numbers that should be compared. (actually digits in this case)
     * @return int The LCM of an array.
     */
    public function computeLcmForDigits($digits) {
        $lcmScore = $digits[0];

        for ($index = 1; $index < count($digits); $index ++) {
            $lcmScore = $this->computeLowestCommonMultiple($lcmScore, $digits[$index]);
        }

        return $lcmScore;
    }

    /**
     * Transform an integer into a string and sort it ascending or descending.
     * @param int $integer The integer that should be converted.
     * @param bool $ascending Whether or not to sort ascending.
     * @return string The converted string.
     */
    public function transformIntegerIntoStringAndSort($integer, $ascending = true) {
        $stringTemp = str_split($integer);

        if ($ascending) {
            sort($stringTemp, SORT_NUMERIC);
        } else {
            rsort($stringTemp, SORT_NUMERIC);
        }

        return implode('', $stringTemp);
    }

    /**
     * Compute the prime substring (first substring, S1)
     * @return string S1, the first substring.
     */
    public function primeSubstring() {
        $primeStringArray = $this->getPrimeIndexesFromProblemString();
        $lcmScore = $this->computeLcmForDigits($primeStringArray);
        $primeString = $this->transformIntegerIntoStringAndSort($lcmScore);

        return $primeString;
    }

    /**
     * Get an array with the values of the odd indexes that are not primes, from the problem string.
     * @return array
     */
    public function getOddIndexesFromProblemStringThatAreNotPrime() {
        // get substring that contains odd indexes and that are not prime.
        $originalSubstringArray = str_split($this->problemString);
        $oddSubstring = array();

        foreach($originalSubstringArray as $index => $decimal) {
            if ($index % 2 == 1 && !in_array($index, $this->primeNumbers)) {
                array_push($oddSubstring, (int) $this->problemString[$index - 1]);
            }
        }

        return $oddSubstring;
    }

    /**
     * Compute the highest common factor for an array of numbers.
     * @param array $digits The array of numbers that should be searched (actually an array of digits in our case).
     * @return int The highest common factor of the provided array.
     */
    public function computeHcfForDigits($digits) {
        $hcfScore = $digits[0];

        for ($index = 1; $index < count($digits); $index ++) {
            $hcfScore = $this->computeGreatestCommonDivisor($hcfScore, $digits[$index]);
        }

        return $hcfScore;
    }

    /**
     * The odd substring (S2).
     * @return string S2, the odd substring.
     */
    public function oddSubstring() {
        $oddStringArray = $this->getOddIndexesFromProblemStringThatAreNotPrime();
        $hcfScore = $this->computeHcfForDigits($oddStringArray);
        $oddString = $this->transformIntegerIntoStringAndSort($hcfScore, false);

        return $oddString;
    }

    /**
     * Main wrapper method that calls all of the sub-components for computing the strings and their values.
     * @return string
     */
    public function getSonForString() {
        // generate prime numbers
        $this->getPrimeNumbersSmallerThanTheProblemString();

        // compute primeSubstring
        $primeSubstring = $this->primeSubstring();

        // compute secondSubstring
        $oddString = $this->oddSubstring();

        // concatenate substrings and return them

        return $primeSubstring . $oddString;
    }
}

