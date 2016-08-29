<?php
/**
 * @author Rizart Dokollari <r.dokollari@linkwi.se>
 * @since 8/23/16
 */

namespace App;

/**
 * Interface Expression
 * @package App
 */
interface Expression
{
    /**
     * @param Bank $bank
     * @param $currency
     * @return Money
     */
    public function reduce(Bank $bank, $currency);

    /**
     * @param Expression $addend
     * @return mixed
     */
    public function plus(Expression $addend);
}