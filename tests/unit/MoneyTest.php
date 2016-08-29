<?php

use App\Bank;
use App\Expression;
use App\Money;
use App\Sum;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/18/16
 */
class MoneyTest extends \PHPUnit_Framework_TestCase
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
        $this->assertEquals('CHF', Money::franc(3)->getCurrency());
    }

    /** @test */
    public function simple_addition_of_us_dollars()
    {
        $moneySum = Money::dollar(5)->plus(Money::dollar(5));
        $this->assertInstanceOf(Expression::class, $moneySum);

        $bank = new Bank();
        $reducedMoney = $bank->reduce($moneySum, 'USD');

        $this->assertInstanceOf(Money::class, $reducedMoney);
        $this->assertSame($reducedMoney->getCurrency(), 'USD');

        $this->assertTrue(Money::dollar(10)->equals($reducedMoney));
    }

    /** @test */
    public function plus_returns_sum()
    {
        $five = Money::dollar(5);
        $result = $five->plus($five);

        $this->assertInstanceOf(Sum::class, $result);
        $this->assertEquals($five, $result->augend);
        $this->assertEquals($five, $result->addend);
    }

    /** @test */
    public function reduce_sum()
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, 'USD');

        $this->assertTrue(Money::dollar(7)->equals($result));
    }

    /** @test */
    public function reduce_money()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), 'USD');

        $this->assertTrue(Money::dollar(1)->equals($result));
    }

    /** @test */
    public function reduce_money_different_currency()
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $expectedDollars = $bank->reduce(Money::franc(2), 'USD');

        $this->assertTrue(Money::dollar(1)->equals($expectedDollars));
    }

    /** @test */
    public function array_equals()
    {
        $currenciesList1 = ['abc'];
        $currenciesList2 = ['abc'];

        $this->assertEquals($currenciesList1, $currenciesList2);
    }

    /** @test */
    public function identity_rate()
    {
        $this->assertEquals(1, (new Bank())->rate('USD', 'USD'));
    }

    /** @test */
    public function mixed_addition()
    {
        $fiveBucks = Money::dollar(5);
        $tenFranc = Money::franc(10);
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce($fiveBucks->plus($tenFranc), 'USD');

        $this->assertTrue(Money::dollar(10)->equals($result));
    }
}
