<?php

namespace App\Ch1_MultiCurrencyMoney;

class Dollar
{
    public $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($times)
    {
        $this->amount *= $times;
    }
}