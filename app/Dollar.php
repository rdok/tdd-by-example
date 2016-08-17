<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/18/16
 */

namespace App;


/**
 * Class Dollar
 * @package App
 */
class Dollar
{
    /**
     * @var
     */
    private $amount;

    /**
     * Dollar constructor.
     * @param $amount
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param $amount
     */
    public function times($amount)
    {
        $this->amount = $this->amount * $amount;
    }

    public function equals(Dollar $dollar)
    {
        return $this->amount() === $dollar->amount();
    }

    /**
     * @return mixed
     */
    public function amount()
    {
        return $this->amount;
    }
}