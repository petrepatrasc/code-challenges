<?php

require_once 'SudokuValidator.php';

class SudokuValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SudokuValidator
     */
    protected $sudokuValidator;

    public function setUp()
    {
        $this->sudokuValidator = new SudokuValidator();
    }

    public function testCreateMatchArray()
    {
        $expectedResponse = [
            0 => false,
            1 => false,
            2 => false,
            3 => false,
            4 => false,
            5 => false,
            6 => false,
            7 => false,
            8 => false,
            9 => false,
        ];

        $actualResponse = $this->sudokuValidator->createMatchArray();
        $this->assertEquals($expectedResponse, $actualResponse, 'The matcher array was not generated correctly.');
    }
} 