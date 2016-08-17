<?php

use App\Dollar;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/18/16
 */
class DollarTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider multiplicationDollarDataProvider
     * @test
     * @param $amount
     * @param $times
     * @param $expected
     */
    public function multiplies_dollars($amount, $times, $expected)
    {
        $five = new Dollar($amount);

        $five->times($times);

        $this->assertSame($expected, $five->amount());
    }

    public function multiplicationDollarDataProvider()
    {
        return [
            [2, 5, 10],
            [5, 9, 45],
            [50, 90, 4500],
        ];
    }

    /** @test
     * @param $expectedBoolean
     * @param $firstDollarAmount
     * @param $secondDollarAmount
     * @dataProvider equalityDollarDataProvider
     */
    public function two_dollar_object_are_equal_when_they_have_the_same_amount(
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
}
