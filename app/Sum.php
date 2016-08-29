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
     * @param Expression $augend
     * @param Expression $addend
     */
    public function __construct(Expression $augend, Expression $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(Bank $bank, $currency)
    {
        $amount = $this->augend->reduce($bank, $currency)->getAmount()
            + $this->addend->reduce($bank, $currency)->getAmount();

        return new Money($amount, $currency);
    }

    /**
     * @param Expression $addend
     * @return mixed
     */
    public function plus(Expression $addend)
    {
        return null;
    }
}