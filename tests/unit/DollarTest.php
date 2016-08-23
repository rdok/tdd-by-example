<?php

use App\Dollar;
use App\Franc;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/18/16
 */
class DollarTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider multiplicationDollarDataProvider
     * @test
     * @param $condition
     * @param $amount
     * @param $times
     * @param $expected
     */
    public function single_multiplication($condition, $amount, $times, $expected)
    {
        $five = new Dollar($amount);

        $this->assertEquals($condition, (new Dollar($expected))->equals($five->times($times)));
    }

    public function multiplicationDollarDataProvider()
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
        $five = new Dollar(5);
        $this->assertTrue((new Dollar(10))->equals($five->times(2)));
        $this->assertTrue((new Dollar(15))->equals($five->times(3)));
    }

    /** @test
     * @param $expectedBoolean
     * @param $firstDollarAmount
     * @param $secondDollarAmount
     * @dataProvider equalityDollarDataProvider
     */
    public function two_dollar_objects_are_equal_when_they_have_the_same_amount(
        $expectedBoolean,
        $firstDollarAmount,
        $secondDollarAmount
    ) {
        $firstDollarObject = new Dollar($firstDollarAmount);
        $secondDollarObject = new Dollar($secondDollarAmount);

        $this->assertEquals($expectedBoolean, $firstDollarObject->equals($secondDollarObject));
    }

    public function equalityDollarDataProvider()
    {
        return [
            [true, 5, 5],
            [false, 5, 6],
        ];
    }

    /** @test */
    public function equality_with_franc()
    {
        $this->assertFalse((new Dollar(5))->equals(new Franc(5)));

        $this->assertFalse((new Franc(5))->equals(new Dollar(5)));
    }
}
