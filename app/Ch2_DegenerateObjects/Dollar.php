<?php

namespace App\Ch2_DegenerateObjects;

class Dollar {
    public $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function times($number) {
        $amount = $this->amount * $number;

        return new Dollar($amount);
    }
}
