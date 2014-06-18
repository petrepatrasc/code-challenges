<?php

require_once 'BottleSong.php';

class BottleSongTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BottleSong
     */
    protected $bottleClass;

    public function setUp()
    {
        parent::setUp();

        $this->bottleClass = new BottleSong();
    }

    /**
     * @param $number
     * @param $expectedOutput
     * @dataProvider bottleDataProvider
     */
    public function testSingSongForBottle($number, $expectedOutput)
    {
        $actualOutput = $this->bottleClass->singSongForBottle($number);

        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function bottleDataProvider()
    {
        return [
            [7, '7 bottles of beer on the wall, 7 bottles of beer.' . PHP_EOL . 'Take one down and pass it around, 6 bottles of beer on the wall.'],
            [3, '3 bottles of beer on the wall, 3 bottles of beer.' . PHP_EOL . 'Take one down and pass it around, 2 bottles of beer on the wall.'],
            [99, '99 bottles of beer on the wall, 99 bottles of beer.' . PHP_EOL . 'Take one down and pass it around, 98 bottles of beer on the wall.'],
            [2, '2 bottles of beer on the wall, 2 bottles of beer.' . PHP_EOL . 'Take one down and pass it around, 1 bottle of beer on the wall.'],
            [1, '1 bottle of beer on the wall, 1 bottle of beer.' . PHP_EOL . 'Go to the store and buy some more, 99 bottles of beer on the wall.'],
        ];
    }
} 