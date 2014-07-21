<?php


class NumberConvertor
{
    const STARTING_STRING = '1221';

    /**
     * Convert a single digit.
     * @param string $number The digit that should be converted.
     * @return string
     */
    public function convertNumber($number)
    {
        if ('1' === $number) {
            return '2';
        }

        return '1';
    }

    /**
     * Convert a string.
     * @param string $stringToBeTransformed The string that should be converted.
     * @return string The string after it has been converted.
     */
    public function convertString($stringToBeTransformed)
    {
        $output = '';

        for ($iterator = 0; $iterator < strlen($stringToBeTransformed); $iterator++) {
            $output .= $this->convertNumber($stringToBeTransformed[$iterator]);
        }

        return $output;
    }

    /**
     * Calculate the string up to a particular index.
     * @param int $index
     * @return string
     */
    public function calculateStringUpToIndex($index)
    {
        $string = self::STARTING_STRING;

        while (strlen($string) < $index) {
            $inversedString = $this->convertString($string);
            $string = $string . $inversedString . $inversedString . $string;
        }

        return substr($string, 0, $index);
    }

    /**
     * When looking for indexes, if we've reached values <= 4, then we've reached our recursion end and we must return one of the values below.
     * @param int $index
     * @return string
     */
    public function returnBaseValueOfIndex($index)
    {
        switch ($index) {
            case 1:
                return '1';
            case 2:
                return '2';
            case 3:
                return '2';
            default:
                return '1';
        }
    }

    /**
     * Calculate the value held by a particular index using an efficient algorithm.
     * @param int $index
     * @return string
     */
    public function calculateValueOfIndex($index)
    {
        if ($index <= 4) {
            return $this->returnBaseValueOfIndex($index);
        }

        $higherPowerOfFour = $this->calculatePowerOfFourHigherThanIndex($index);
        $lowerPowerOfFour = $higherPowerOfFour / 4;

        $numberOfCompleteGroupsSoFar = (int)($index / $lowerPowerOfFour);
        $newIndex = $this->transposeGroupsAndGetNewIndexToSearchFor($index, $lowerPowerOfFour, $numberOfCompleteGroupsSoFar);
        $result = $this->calculateValueOfIndex($newIndex);

        /* Make sure that if we're on the converted groups of elements, that we convert the final recursive result. */
        if ($numberOfCompleteGroupsSoFar === 1 || $numberOfCompleteGroupsSoFar === 2) {
            $result = $this->convertNumber($result);
        }

        return $result;
    }

    /**
     * Calculate the power of four number that is higher than the index.
     * @param int $index The index.
     * @return int The power of four number that is higher than the index.
     */
    public function calculatePowerOfFourHigherThanIndex($index)
    {
        return pow(4, ceil(log($index, 4)));
    }

    /**
     * Transpose the indexed element (now that we have it's column), to the first group in the string, so that we can go deeper recursively.
     * @param int $index
     * @param int $lowerPowerOfFour
     * @param int $numberOfCompleteGroupsSoFar
     * @return int
     */
    protected function transposeGroupsAndGetNewIndexToSearchFor($index, $lowerPowerOfFour, $numberOfCompleteGroupsSoFar)
    {
        $highestNumberInPreviousRow = $lowerPowerOfFour * $numberOfCompleteGroupsSoFar;
        $newIndex = $index - $highestNumberInPreviousRow;
        return $newIndex;
    }
} 