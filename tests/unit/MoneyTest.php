<?php

use App\Money;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/18/16
 */
class MoneyTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function single_multiplication()
    {
        $this->assertEquals(true, Money::dollar(10)->equals(Money::dollar(5)->times(2)));
        $this->assertEquals(true, Money::dollar(45)->equals(Money::dollar(9)->times(5)));
        $this->assertEquals(false, Money::dollar(5)->equals(Money::dollar(90)->times(40)));
    }

    /** @test */
    public function trailing_multiplications()
    {
        $five = Money::dollar(5);

        $this->assertTrue((Money::dollar(10))->equals($five->times(2)));
        $this->assertTrue((Money::dollar(15))->equals($five->times(3)));
    }

    /** @test */
    public function equality_with_franc()
    {
        $this->assertFalse(Money::dollar(6)->equals(Money::franc(6)));
        $this->assertFalse(Money::dollar(6)->equals(Money::franc(5)));
    }

    /** @test */
    public function currency()
    {
        $this->assertEquals('USD', Money::dollar(3)->getCurrency());
    }
}
