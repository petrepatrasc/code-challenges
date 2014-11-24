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

    public function testLoadBoard()
    {
        $this->sudokuValidator->loadBoard("132579468
498261375
756384219
643158792
521793846
987426531
214935687
365817924
879642153");

        $expectedResponse = [
            [1, 3, 2, 5, 7, 9, 4, 6, 8],
            [4, 9, 8, 2, 6, 1, 3, 7, 5],
            [7, 5, 6, 3, 8, 4, 2, 1, 9],
            [6, 4, 3, 1, 5, 8, 7, 9, 2],
            [5, 2, 1, 7, 9, 3, 8, 4, 6],
            [9, 8, 7, 4, 2, 6, 5, 3, 1],
            [2, 1, 4, 9, 3, 5, 6, 8, 7],
            [3, 6, 5, 8, 1, 7, 9, 2, 4],
            [8, 7, 9, 6, 4, 2, 1, 5, 3],
        ];

        $actualResponse = $this->sudokuValidator->getBoard();

        $this->assertEquals($expectedResponse, $actualResponse, 'The board was not loaded correctly, despite having a good format.');
    }

    public function testCheckBoard_Valid() {
        $actualResponse = $this->sudokuValidator->checkBoard("132579468
498261375
756384219
643158792
521793846
987426531
214935687
365817924
879642153");

        $this->assertTrue($actualResponse, 'Expected board check to be true');
        $this->assertInternalType('bool', $actualResponse);
    }

    public function testCheckBoard_Invalid() {
        $actualResponse = $this->sudokuValidator->checkBoard("132579468
498261375
756384219
643158792
521793846
987426531
214935687
365817924
879642135");

        $this->assertFalse($actualResponse, 'Expected board check to be false');
        $this->assertInternalType('bool', $actualResponse);
    }

    public function testAreaConstraintsHold_Valid()
    {
        $this->sudokuValidator->loadBoard("132579468
498261375
756384219
643158792
521793846
987426531
214935687
365817924
879642153");

        $actualResponse = $this->sudokuValidator->areaConstraintsHold();

        $this->assertTrue($actualResponse, 'Expected area constraints to pass');
        $this->assertInternalType('bool', $actualResponse);
    }

    public function testAreaConstraintsHold_Invalid()
    {
        $this->sudokuValidator->loadBoard("132579468
418261375
756384219
643158792
521793846
987426531
214935687
365817924
879642135");

        $actualResponse = $this->sudokuValidator->areaConstraintsHold();

        $this->assertFalse($actualResponse, 'Expected area constraints to fail');
        $this->assertInternalType('bool', $actualResponse);
    }

    public function testColumnConstraintsHold_Valid()
    {
        $this->sudokuValidator->loadBoard("132579468
498261375
756384219
643158792
521793846
987426531
214935687
365817924
879642153");

        $actualResponse = $this->sudokuValidator->columnConstraintsHold();

        $this->assertTrue($actualResponse, 'Expected column constraints to hold');
        $this->assertInternalType('bool', $actualResponse);
    }

    public function testColumnConstraintsHold_Invalid()
    {
        $this->sudokuValidator->loadBoard("132579468
498261375
756384219
643158792
521793846
987426531
214935687
365817924
879642135");

        $actualResponse = $this->sudokuValidator->columnConstraintsHold();

        $this->assertFalse($actualResponse, 'Expected column constraints to fail');
        $this->assertInternalType('bool', $actualResponse);
    }

    public function testRowConstraintsHold_Valid()
    {
        $this->sudokuValidator->loadBoard("132579468
498261375
756384219
643158792
521793846
987426531
214935687
365817924
879642153");

        $actualResponse = $this->sudokuValidator->rowConstraintsHold();

        $this->assertTrue($actualResponse, 'Expected row constraints to hold');
        $this->assertInternalType('bool', $actualResponse);
    }

    public function testRowConstraintsHold_Invalid()
    {
        $this->sudokuValidator->loadBoard("132579461
498261375
756384219
643158792
521793846
987426531
214935687
365817924
879642153");

        $actualResponse = $this->sudokuValidator->rowConstraintsHold();

        $this->assertFalse($actualResponse, 'Expected row constraints to fail');
        $this->assertInternalType('bool', $actualResponse);
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