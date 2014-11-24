<?php


class SudokuValidator
{

    /**
     * @var array
     */
    protected $board;

    /**
     * @param string $data Data, as represented in the input format.
     */
    public function loadBoard($data)
    {
        /* Load data here. */
    }

    /**
     * Check if the row constraints hold.
     * @return bool
     */
    public function rowConstraintsHold()
    {

    }

    /**
     * Check if the column constraints hold.
     * @return bool
     */
    public function columnConstraintsHold()
    {

    }

    /**
     * Check if the area constraints hold.
     * @return bool
     */
    public function areaConstraintsHold()
    {

    }

    /**
     * Check if a string represents a valid Sudoku board.
     * @param string $inputData
     * @return bool
     */
    public function checkBoard($inputData)
    {
        $this->loadBoard($inputData);

        if (!$this->rowConstraintsHold()) {
            return false;
        }

        if (!$this->columnConstraintsHold()) {
            return false;
        }

        if (!$this->areaConstraintsHold()) {
            return false;
        }

        return true;
    }

    /**
     * Check if an element has already been matched in an array.
     * @param array $matched
     * @param int $element
     * @return bool
     */
    public function elementHasBeenAlreadyMatched(array $matched, $element)
    {
        return $matched[$element] === true;
    }

    /**
     * Check if an element belongs to the correct data set.
     * @param int $element
     * @return bool
     */
    public function elementBelongsToCorrectSet($element)
    {
        if ($element < 1 || $element > 9) {
            return false;
        }

        if ($element !== intval($element)) {
            return false;
        }

        return true;
    }

    /**
     * Create a matcher array, filled with false, between 0 and 9.
     * @return array
     */
    public function createMatchArray()
    {
        return array_fill(0, 10, false);
    }
} 