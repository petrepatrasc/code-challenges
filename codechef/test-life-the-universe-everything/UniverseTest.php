<?php

require 'Universe.php';

class UniverseTest extends PHPUnit_Framework_TestCase {

    public function testIfFortyTwoIsTheAnswer() {
        $universe = new Universe();
        $answerFound = $universe->providedNumberIsTheAnswer(42);

        $this->assertTrue($answerFound);
    }

    public function testIfNotFortyTwoIsTheAnswer() {
        $universe = new Universe();
        $answerFound = $universe->providedNumberIsTheAnswer(38);

        $this->assertFalse($answerFound);
    }
}