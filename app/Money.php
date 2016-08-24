<?php
/**
 * @author Rizart Dokollari <r.dokollari@linkwi.se>
 * @since 8/23/16
 */

namespace App;

class Money
{
    /**
     * @var int
     */
    protected $amount;
    /**
     * @var null|string
     */
    protected $currency;

    /**
     * Money constructor.
     * @param $amount
     * @param null $currency
     */
    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @param $amount
     * @return Money
     */
    public static function dollar($amount)
    {
        return new Money($amount, 'USD');
    }

    public static function franc($amount)
    {
        return new Money($amount, 'CHF');
    }

    /**
     * @param $multiplier
     * @return $this
     */
    public function times($multiplier)
    {
        return new $this($this->amount * $multiplier, $this->currency);
    }

    public function equals(Money $money)
    {
        return $this->amount === $money->amount && get_class($this) === get_class($money)
        && $this->currency === $money->currency;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return null|string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
