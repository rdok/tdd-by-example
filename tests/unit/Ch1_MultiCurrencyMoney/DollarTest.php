<?php

namespace Tests\Unit\Ch1_MultiCurrencyMoney;

use App\Ch1_MultiCurrencyMoney\Dollar;
use Tests\Unit\UnitTestCase;

class DollarTest extends UnitTestCase
{
    public function testMultiplication()
    {
        $fiveDollars = new Dollar(5);

        $fiveDollars->times(2);

        $this->assertEquals(10, $fiveDollars->amount());
    }
}