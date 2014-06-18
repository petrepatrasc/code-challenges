<?php

require_once 'HardshadNumber.php';

class HardshadNumberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HardshadNumber
     */
    protected $hardshadClass;

    public function setUp()
    {
        $this->hardshadClass = new HardshadNumber();
    }

    public function testGenerateHarshadNumbersToLimit()
    {
        $actualResponse = $this->hardshadClass->generateHarshadNumbersToLimit(20);
        $expectedResponse = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 18, 20];

        $this->assertCount(13, $actualResponse);
        $this->assertEquals($expectedResponse, $actualResponse);
    }

    public function testCheckIfNumbersAreTheOnesExpected()
    {
        $response = $this->hardshadClass->generateHarshadNumbersToLimit(10000);

        $this->assertCount(1538, $response);
    }

    /**
     * @param $number
     * @param $validity
     * @dataProvider harshadNumberDataProvider
     */
    public function testCheckIfNumberIsHarshad($number, $validity)
    {
        $this->assertEquals($validity, $this->hardshadClass->checkIfNumberIsHarshad($number));
    }

    public function harshadNumberDataProvider()
    {
        return [
            [1, true],
            [12, true],
            [11, false],
            [199, false],
            [200, true],
        ];
    }
} 