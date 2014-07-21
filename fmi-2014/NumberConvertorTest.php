<?php

require_once 'NumberConvertor.php';

class NumberConvertorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NumberConvertor
     */
    protected $numberConvertor;

    public function setUp()
    {
        parent::setUp();

        $this->numberConvertor = new NumberConvertor();
    }

    /**
     * @param $index
     * @param $expectedResult
     * @dataProvider calculateStringUpToIndexDataProvider
     */
    public function testCalculateStringUpToIndex($index, $expectedResult)
    {
        $actualResult = $this->numberConvertor->calculateStringUpToIndex($index);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function calculateStringUpToIndexDataProvider()
    {
        return [
            [3, '122'],
            [18, '122121122112122121'],
            [4, '1221'],
            [16, '1221211221121221'],
            [15, '122121122112122'],
        ];
    }

    /**
     * @param $index
     * @param $expectedResult
     * @dataProvider calculatePowerOfFourHigherThanIndexDataProvider
     */
    public function testCalculatePowerOfFourHigherThanIndex($index, $expectedResult)
    {
        $actualResult = $this->numberConvertor->calculatePowerOfFourHigherThanIndex($index);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function calculatePowerOfFourHigherThanIndexDataProvider()
    {
        return [
            [3, 4],
            [12, 16],
            [32, 64],
            [65, 256],
            [64, 64],
            [16, 16],
        ];
    }

    /**
     * @param $index
     * @param $expectedResult
     * @dataProvider calculateValueOfIndexDataProvider
     */
    public function testCalculateValueOfIndex($index, $expectedResult)
    {
        $actualResult = $this->numberConvertor->calculateValueOfIndex($index);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function calculateValueOfIndexDataProvider()
    {
        return [
            [1, '1'],
            [2, '2'],
            [3, '2'],
            [4, '1'],
            [11, '1'],
            [20, '2'],
            [65, '2'],
            [43, '2'],
        ];
    }

    /**
     * @param $string
     * @param $expectedResult
     * @dataProvider convertStringDataProvider
     */
    public function testConvertString($string, $expectedResult)
    {
        $actualResult = $this->numberConvertor->convertString($string);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function convertStringDataProvider()
    {
        return [
            ['1', '2'],
            ['2', '1'],
            ['1221', '2112'],
            ['221', '112'],
            ['1221211221121221', '2112122112212112'],
        ];
    }

    /**
     * @param $number
     * @param $expectedResult
     * @dataProvider convertNumberDataProvider
     */
    public function testConvertNumber($number, $expectedResult)
    {
        $actualResult = $this->numberConvertor->convertNumber($number);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function convertNumberDataProvider()
    {
        return [
            ['1', '2'],
            ['2', '1'],
        ];
    }
} 