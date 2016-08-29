<?php
/**
 * @author Rizart Dokollari <r.dokollari@linkwi.se>
 * @since 8/26/16
 */

namespace App;


class Sum implements Expression
{
    public $augend;
    public $addend;

    /**
     * Sum constructor.
     * @param Money $augend
     * @param Money $addend
     */
    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce($currency)
    {
        $amount = $this->augend->getAmount() + $this->addend->getAmount();

        return new Money($amount, $currency);
    }
}