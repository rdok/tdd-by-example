<?php
/**
 * @author Rizart Dokollari <r.dokollari@linkwi.se>
 * @since 8/23/16
 */

namespace App;

class Bank
{
    private $rates = [];

    /**
     * @param Expression $source
     * @param string $currency
     * @return Money|Expression
     */
    public function reduce(Expression $source, $currency)
    {
        return $source->reduce($this, $currency);
    }

    /**
     * @param string $currency1
     * @param string $currency2
     * @param $rate
     */
    public function addRate($currency1, $currency2, $rate)
    {
        $this->rates[$currency1 . $currency2] = $rate;
    }

    /**
     * @param string $currency1
     * @param string $currency2
     * @return int
     */
    public function rate($currency1, $currency2)
    {
        if ($currency1 === $currency2) {
            return 1;
        }

        return $this->rates[$currency1 . $currency2];
    }
}