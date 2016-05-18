<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/18/16
 */

namespace App;


class Dollar
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($amount)
    {
        $this->amount = $this->amount * $amount;
    }

    public function amount()
    {
        return $this->amount;
    }
}