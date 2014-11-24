<?php


class SudokuValidator
{

    protected $board;

    /**
     * @param string $data Data, as represented in the input format.
     */
    public function loadBoard($data)
    {
        /* Load data here. */
    }

    public function rowConstraintsHold()
    {

    }

    public function columnConstraintsHold()
    {

    }

    public function areaConstraintsHold()
    {

    }

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

    protected function elementHasBeenAlreadyMatched($matched, $element)
    {

    }

    protected function elementBelongsToCorrectSet($element)
    {
        if ($element < 1 || $element > 9) {
            return false;
        }

        if ($element !== intval($element)) {
            return false;
        }

        return true;
    }
} 