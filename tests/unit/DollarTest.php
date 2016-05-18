<?php
use App\Dollar;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/18/16
 */
class DollarTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dollarDataProvider
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

    public function dollarDataProvider()
    {
        return [
            [2, 5, 10],
            [5, 9, 45],
            [50, 90, 4500],
        ];
    }
}