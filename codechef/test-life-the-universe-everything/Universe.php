<?php

class Universe {

    /**
     * @var int
     */
    protected $answerToEverything = 42;

    public function providedNumberIsTheAnswer($numberToTest) {
        if ($numberToTest != $this->answerToEverything) {
            return false;
        }

        return true;
    }
}

