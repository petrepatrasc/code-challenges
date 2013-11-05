<?php

class SonOfString {
    protected $primeNumbers;
    protected $originalString;

    public function __construct($string) {
        $this->originalString = $string;
    }

    /**
     * Get prime numbers that are smaller than the size of the string.
     * @param int $limit The size of the string that is provided.
     * @return array Array containing prime numbers that are smaller than the limit.
     */
    public static function eratostene($limit) {
        $primeNumbers = array_fill(2, $limit - 1, true);

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
        return $dataToBeReturned;
    }

    private function computeHcfForDigits($digits) {
        for ($i = 9; $i > 1; $i--) {
            $notFound = false;

            foreach ($digits as $digit) {
                if ($digit % $i !== 0) {
                    $notFound = true;
                    break;
                }
            }

            if ($notFound === false) {
                return $i;
            }
        }

        return 1;
    }

    private function highestCommonFactor($substring) {
        $hcf = array_fill(1, 9, null);

        foreach($substring as $digit) {
            $hcf[$digit] = true;
        }

        return (string) $this->computeHcfForDigits($hcf);
    }

    private function computeLcmForDigits($digits) {
        $lcmScore = 1;

        for ($index = 2; $index < 10; $index ++) {
            if ($index == 6 && isset($digits[$index])) {

                if (isset($digits[2]) && isset($digits[3])) {
                    $lcmScore *= 6;
                } else if (isset($digits[2]) && !isset($digits[3])) {
                    $lcmScore *= 2;
                } else if (isset($digits[3]) && !isset($digits[2])) {
                    $lcmScore *= 3;
                }
            } else if ($digits[$index] && !isset($digits[$index * 2]) && !isset($digits[$index * 3]) && !isset($digits[$index * 4])) {
                echo "Inmultesc cu: " . $index . PHP_EOL;
                $lcmScore *= $index;
            }
        }

        var_dump($lcmScore);

        return $lcmScore;
    }

    private function leastCommonMultiple($substring) {
        $lcm = array_fill(1, 9, null);

        foreach($substring as $digit) {
            $lcm[$digit] = true;
        }

        return (string) $this->computeLcmForDigits($lcm);
    }

    private function primeSubstring() {
        // get substring from prime numbers
        $primeSubstring = array();
        foreach($this->primeNumbers as $index) {
            array_push($primeSubstring, (int) $this->originalString[$index - 1]);
        }

        // compute LCM for substring
        $lcmScore = str_split($this->leastCommonMultiple($primeSubstring));

        // sort substring ascending
        sort($lcmScore, SORT_NUMERIC);
        $lcmScore = implode('', $lcmScore);

        return $lcmScore;
    }

    private function oddSubstring() {
        // get substring that contains odd indexes and that are not prime.
        $originalSubstringArray = str_split($this->originalString);

        $oddSubstring = array();
        foreach($originalSubstringArray as $index => $decimal) {
            if ($index % 2 == 1 && !in_array($index, $this->primeNumbers)) {
                array_push($oddSubstring, (int) $this->originalString[$index - 1]);
            }
        }

        // compute HCF for substring
        $hcfScore = str_split($this->highestCommonFactor($oddSubstring));

        // sort substring ascending
        rsort($hcfScore, SORT_NUMERIC);
        $hcfScore = implode('', $hcfScore);

        return $hcfScore;
    }

    public function getSonForString() {
        // generate prime numbers
        $this->primeNumbers = self::eratostene(strlen($this->originalString));

        // compute primeSubstring
        $primeSubstring = $this->primeSubstring();

        // compute secondSubstring
        $oddString = $this->oddSubstring();

        // concatenate substrings and return them

        return $primeSubstring . $oddString;
    }
}

$sonOfStringClass = new SonOfString('43729419874683');
$son = $sonOfStringClass->getSonForString();
echo $son . PHP_EOL;

$sonOfStringClass = new SonOfString('79538641259476321');
$son = $sonOfStringClass->getSonForString();
echo $son . PHP_EOL;

$sonOfStringClass = new SonOfString('43142717214142986637');
$son = $sonOfStringClass->getSonForString();
echo $son . PHP_EOL;

$sonOfStringClass = new SonOfString('56969797129260783535171');
$son = $sonOfStringClass->getSonForString();
echo $son . PHP_EOL;
