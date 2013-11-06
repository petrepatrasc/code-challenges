<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 11/6/13
 * Time: 1:18 AM
 * To change this template use File | Settings | File Templates.
 */

require 'SonOfString.php';

class SonOfStringTest extends PHPUnit_Framework_TestCase {

    /**
     * @var SonOfString
     */
    protected $son;

    public function setUp() {
        parent::setUp();

        $this->son = new SonOfString();
    }

    public function testPrimeNumbersSmallerThanTwenty() {
        $this->son->setProblemString('11111111111111111111');
        $primeNumbers = $this->son->getPrimeNumbersSmallerThanTheProblemString();

        $expectedResult = array(2, 3, 5, 7, 11, 13, 17, 19);
        $this->assertEquals($expectedResult, $primeNumbers);
    }

    public function testGetPrimeStringArray() {
        $this->son->setProblemString('43729419874683');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $primeStringArray = $this->son->getPrimeIndexesFromProblemString();

        $expectedResult = array(3, 7, 9, 1, 4, 8);
        $this->assertEquals($expectedResult, $primeStringArray);
    }

    public function testGreatestCommonDivisor() {
        $result = $this->son->computeGreatestCommonDivisor(2, 3);
        $this->assertEquals(1, $result);

        $result = $this->son->computeGreatestCommonDivisor(2, 0);
        $this->assertEquals(2, $result);

        $result = $this->son->computeGreatestCommonDivisor(3, 2);
        $this->assertEquals(1, $result);

        $result = $this->son->computeGreatestCommonDivisor(6, 3);
        $this->assertEquals(3, $result);

        $result = $this->son->computeGreatestCommonDivisor(3, -2);
        $this->assertEquals(1, $result);
    }

    public function testLowestCommonMultiple() {
        $result = $this->son->computeLowestCommonMultiple(2, 3);
        $this->assertEquals(6, $result);

        $result = $this->son->computeLowestCommonMultiple(6, 3);
        $this->assertEquals(6, $result);

        $result = $this->son->computeLowestCommonMultiple(6, 8);
        $this->assertEquals(24, $result);
    }

    public function testComputeLcmForDigits() {
        // Case 1
        $this->son->setProblemString('43729419874683');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $primeStringArray = $this->son->getPrimeIndexesFromProblemString();

        $actualLcm = $this->son->computeLcmForDigits($primeStringArray);
        $expectedLcm = 504;

        $this->assertEquals($expectedLcm, $actualLcm);

        // Case 2
        $this->son->setProblemString('56969797129260783535171');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $primeStringArray = $this->son->getPrimeIndexesFromProblemString();

        $actualLcm = $this->son->computeLcmForDigits($primeStringArray);
        $expectedLcm = 18;

        $this->assertEquals($expectedLcm, $actualLcm);

        // Case 3
        $this->son->setProblemString('523');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $primeStringArray = $this->son->getPrimeIndexesFromProblemString();

        $actualLcm = $this->son->computeLcmForDigits($primeStringArray);
        $expectedLcm = 6;

        $this->assertEquals($expectedLcm, $actualLcm);

        // Case 3
        $this->son->setProblemString('79538641259476321');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $primeStringArray = $this->son->getPrimeIndexesFromProblemString();

        $actualLcm = $this->son->computeLcmForDigits($primeStringArray);
        $expectedLcm = 2520;

        $this->assertEquals($expectedLcm, $actualLcm);
    }

    public function testGetPrimeSubstring() {
        // Case 1
        $this->son->setProblemString('43729419874683');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $primeSubstring = $this->son->primeSubstring();

        $this->assertEquals('045', $primeSubstring);

        // Case 2
        $this->son->setProblemString('79538641259476321');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $primeSubstring = $this->son->primeSubstring();

        $this->assertEquals('0225', $primeSubstring);

        // Case 3
        $this->son->setProblemString('43142717214142986637');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $primeSubstring = $this->son->primeSubstring();

        $this->assertEquals('12', $primeSubstring);

        // Case 4
        $this->son->setProblemString('56969797129260783535171');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $primeSubstring = $this->son->primeSubstring();

        $this->assertEquals('18', $primeSubstring);
    }

    public function testGetOddIndexesFromProblemStringThatAreNotPrime() {
        // Case 1
        $this->son->setProblemString('43729419874683');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $oddStringArray = $this->son->getOddIndexesFromProblemStringThatAreNotPrime();

        $expectedResult = array(4, 8);
        $this->assertEquals($expectedResult, $oddStringArray);

        // Case 2
        $this->son->setProblemString('79538641259476321');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $oddStringArray = $this->son->getOddIndexesFromProblemStringThatAreNotPrime();

        $expectedResult = array(7, 2, 3);
        $this->assertEquals($expectedResult, $oddStringArray);

        // Case 3
        $this->son->setProblemString('43142717214142986637');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $oddStringArray = $this->son->getOddIndexesFromProblemStringThatAreNotPrime();

        $expectedResult = array(4, 2, 9);
        $this->assertEquals($expectedResult, $oddStringArray);
    }

    public function testComputeHcfDigits() {
        // Case 1
        $this->son->setProblemString('43729419874683');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $oddStringArray = $this->son->getOddIndexesFromProblemStringThatAreNotPrime();

        $actualHcf = $this->son->computeHcfForDigits($oddStringArray);
        $expectedHcf = 4;

        $this->assertEquals($expectedHcf, $actualHcf);

        // Case 1
        $this->son->setProblemString('79538641259476321');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $oddStringArray = $this->son->getOddIndexesFromProblemStringThatAreNotPrime();

        $actualHcf = $this->son->computeHcfForDigits($oddStringArray);
        $expectedHcf = 1;

        $this->assertEquals($expectedHcf, $actualHcf);

        // Case 1
        $this->son->setProblemString('43142717214142986637');
        $this->son->getPrimeNumbersSmallerThanTheProblemString();
        $oddStringArray = $this->son->getOddIndexesFromProblemStringThatAreNotPrime();

        $actualHcf = $this->son->computeHcfForDigits($oddStringArray);
        $expectedHcf = 1;

        $this->assertEquals($expectedHcf, $actualHcf);
    }

    public function testGetSonForString() {
        $this->son->setProblemString('43729419874683');
        $actualSon = $this->son->getSonForString();
        $this->assertEquals('0454', $actualSon);

        $this->son->setProblemString('79538641259476321');
        $actualSon = $this->son->getSonForString();
        $this->assertEquals('02251', $actualSon);

        $this->son->setProblemString('43142717214142986637');
        $actualSon = $this->son->getSonForString();
        $this->assertEquals('121', $actualSon);

        $this->son->setProblemString('56969797129260783535171');
        $actualSon = $this->son->getSonForString();
        $this->assertEquals('181', $actualSon);

        $this->son->setProblemString('4563573640980834232');
        $actualSon = $this->son->getSonForString();
        $this->assertEquals('091', $actualSon);

        $this->son->setProblemString('000333');
        $actualSon = $this->son->getSonForString();
        $this->assertEquals('30', $actualSon);

        $this->son->setProblemString('3981726696600133355715331647785875776685752905416869036518518501487655948416925677563994453222094482');
        $actualSon = $this->son->getSonForString();
        $this->assertEquals('02251', $actualSon);

        $numbers = array(
            '00',
            '3322643057205206050972287950806091221077301350056626679362102265066208293040564336652333245864021629935033819056113219328252059399201840144582825121501381119353759722242031223264559327431608967779705023977557433229831505812223873459986082819390089365569177530269913648172112299050718957464118919031723952838232251497036339731392920004292330782774037558977895166512951376595576512718455700973106902710318878866406601199617087915938891686956448274443374203084562871593890531465208793125957087477058304434803248698958138479399167926356494837123944493268708110822481598815621019007435298595447494811289333349239399006595841294568546869199528928192263812844200100730371684429986196977503760407750173627372276890427922790362936582917129895060562211207347703895079421406362640260063307149579386040656299932215354258907537620212860183399548169746544653255770985756879687703840493366088456460801747447657085515041155519808633371557606289371274194836932231249941972525817812403031948543447891933172205461632546',
        );

        foreach ($numbers as $number) {
            $this->son->setProblemString($number);
            $actualSon = $this->son->getSonForString();
            $this->assertEquals('02251', $actualSon);
        }
    }
}