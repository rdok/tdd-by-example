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
     * @param $multiplier
     * @return $this
     */
    public function times($multiplier)
    {
        return new Dollar($this->amount * $multiplier);
    }

    public function equals(Dollar $dollar)
    {
        return $this->amount === $dollar->amount;
    }
}
