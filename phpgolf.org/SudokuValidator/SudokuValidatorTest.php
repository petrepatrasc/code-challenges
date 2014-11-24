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
        $this->assertInternalType('array', $actualResponse);
    }

    /**
     * @param $input
     * @param $expectedResponse
     * @dataProvider elementBelongsToCorrectSetDataProvider
     */
    public function testElementBelongsToCorrectSet($input, $expectedResponse)
    {
        $actualResponse = $this->sudokuValidator->elementBelongsToCorrectSet($input);

        $this->assertEquals($expectedResponse, $actualResponse, 'The element was not identified as not being in the correct set correctly.');
        $this->assertInternalType('bool', $actualResponse);
    }

    public function elementBelongsToCorrectSetDataProvider()
    {
        return [
            [1, true],
            [3, true],
            [6, true],
            [9, true],
            [0, false],
            [10, false],
            [3.3, false]
        ];
    }

    /**
     * @depends testCreateMatchArray
     */
    public function testElementHasBeenAlreadyMatched()
    {
        $matches = $this->sudokuValidator->createMatchArray();
        $matches[3] = true;

        $actualResult = $this->sudokuValidator->elementHasBeenAlreadyMatched($matches, 2);
        $this->assertFalse($actualResult, '2 was reported as being matched, although it was not.');

        $actualResult = $this->sudokuValidator->elementHasBeenAlreadyMatched($matches, 3);
        $this->assertTrue($actualResult, '3 was reported as being not matched, although it was.');
    }
} 