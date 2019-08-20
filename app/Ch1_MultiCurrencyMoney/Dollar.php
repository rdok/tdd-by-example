<?php

namespace App\Ch1_MultiCurrencyMoney;

class Dollar
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($number)
    {
        $this->amount = $this->amount * $number;
    }

    public function amount()
    {
        return $this->amount;
    }
}