<?php
use App\Franc;

/**
 * @author Rizart Dokollari <r.dokollari@linkwi.se>
 * @since 8/23/16
 */
class FrancTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider multiplicationFrancDataProvider
     * @test
     * @param $condition
     * @param $amount
     * @param $times
     * @param $expected
     */
    public function single_multiplication($condition, $amount, $times, $expected)
    {
        $five = new Franc($amount);

        $this->assertEquals($condition, (new Franc($expected))->equals($five->times($times)));
    }

    public function multiplicationFrancDataProvider()
    {
        return [
            [true, 2, 5, 10],
            [true, 5, 9, 45],
            [true, 50, 90, 4500],
            [false, 5, 90, 40],
        ];
    }

    /** @test */
    public function trailing_multiplications()
    {
        $five = new Franc(5);
        $this->assertTrue((new Franc(10))->equals($five->times(2)));
        $this->assertTrue((new Franc(15))->equals($five->times(3)));
    }

    /** @test
     * @param $expectedBoolean
     * @param $firstFrancAmount
     * @param $secondFrancAmount
     * @dataProvider equalityFrancDataProvider
     */
    public function two_Franc_objects_are_equal_when_they_have_the_same_amount(
        $expectedBoolean,
        $firstFrancAmount,
        $secondFrancAmount
    ) {
        $firstFrancObject = new Franc($firstFrancAmount);
        $secondFrancObject = new Franc($secondFrancAmount);

        $this->assertEquals($expectedBoolean, $firstFrancObject->equals($secondFrancObject));
    }

    public function equalityFrancDataProvider()
    {
        return [
            [true, 5, 5],
            [false, 5, 6],
        ];
    }
}