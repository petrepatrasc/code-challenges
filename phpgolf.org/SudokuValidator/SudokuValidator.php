<?php


class SudokuValidator
{

    /**
     * @var array
     */
    protected $board;

    /**
     * Load data unto the board.
     * @param string $data Data, as represented in the input format.
     * @return array
     */
    public function loadBoard($data)
    {
        $this->board = [];

        $inputRows = explode("\n", $data);

        foreach ($inputRows as $key => $inputRow) {
            $row = str_split($inputRow);

            $this->board[] = $row;
        }

        return $this->board;
    }

    /**
     * Check if the row constraints hold.
     * @return bool
     */
    public function rowConstraintsHold()
    {
        foreach ($this->board as $row) {
            $matched = $this->createMatchArray();

            foreach ($row as $element) {
                if (!$this->elementBelongsToCorrectSet($element)) {
                    return false;
                }

                if ($this->elementHasBeenAlreadyMatched($matched, $element)) {
                    return false;
                }

                $matched[$element] = true;
            }
        }

        return true;
    }

    /**
     * Check if the column constraints hold.
     * @return bool
     */
    public function columnConstraintsHold()
    {
        for ($i = 0; $i < count($this->board[0]); $i++) {
            $columnElements = [];
            $matched = $this->createMatchArray();

            for ($j = 0; $j < count($this->board[0]); $j++) {
                $columnElements[] = $this->board[$j][$i];
            }

            foreach ($columnElements as $element) {
                if (!$this->elementBelongsToCorrectSet($element)) {
                    return false;
                }

                if ($this->elementHasBeenAlreadyMatched($matched, $element)) {
                    return false;
                }

                $matched[$element] = true;
            }
        }

        return true;
    }

    /**
     * Check if the area constraints hold.
     * @return bool
     */
    public function areaConstraintsHold()
    {
        for ($i = 0; $i < count($this->board[0]); $i += 3) {
            for ($j = 0; $j < count($this->board[0]); $j += 3) {
                $matched = $this->createMatchArray();

                $areaElements = [
                    $this->board[$i][$j],
                    $this->board[$i + 1][$j],
                    $this->board[$i + 2][$j],
                    $this->board[$i][$j + 1],
                    $this->board[$i + 1][$j + 1],
                    $this->board[$i + 2][$j + 1],
                    $this->board[$i][$j + 2],
                    $this->board[$i + 1][$j + 2],
                    $this->board[$i + 2][$j + 2],
                ];

                foreach ($areaElements as $element) {
                    if (!$this->elementBelongsToCorrectSet($element)) {
                        return false;
                    }

                    if ($this->elementHasBeenAlreadyMatched($matched, $element)) {
                        return false;
                    }

                    $matched[$element] = true;
                }
            }
        }

        return true;
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

        if ($element != intval($element)) {
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

    /**
     * @return array
     */
    public function getBoard()
    {
        return $this->board;
    }


} 