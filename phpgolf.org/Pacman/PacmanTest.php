<?php

require_once 'Pacman.php';

class PacmanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Pacman
     */
    protected $pacmanClass;

    public function setUp()
    {
        parent::setUp();

        $this->pacmanClass = new Pacman();
    }

    /**
     * @param $firstSegment
     * @param $secondSegment
     * @param $thirdSegment
     * @param $prefixLength
     * @param $expectedResult
     * @dataProvider lineDataProvider
     */
    public function testDrawLine($firstSegment, $secondSegment, $thirdSegment, $prefixLength, $expectedResult)
    {
        $actualResult = $this->pacmanClass->drawLine($firstSegment, $secondSegment, $thirdSegment, $prefixLength);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function lineDataProvider()
    {
        return [
            [3, 2, 3, 0, "   @@   "],
            [2, 1, 0, 1, "@  @"],
        ];
    }

    public function testDrawPacman()
    {
        $actualResult = $this->pacmanClass->drawPacman();
        $expectedResult = "        @@@@@@@@@@@@@@@@@@
    @@@@@@@@@@@@@@@@@@@@@@@@@@
  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@  @@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@      @@@@@@@@@@@@@@@@
    @@@@@@@@@@@@  @@@@@@@@@@@@@@@@@@
      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@
              @@@@@@@@@@@@@@@@@@@@@@@@
                @@@@@@@@@@@@@@@@@@@@@@
              @@@@@@@@@@@@@@@@@@@@@@@@
            @@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @@@@@@@@@@@@@@@@@@@@@@@@@@
        @@@@@@@@@@@@@@@@@@            ";

        $this->assertEquals($expectedResult, $actualResult);
    }
} 