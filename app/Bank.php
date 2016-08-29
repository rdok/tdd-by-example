<?php
/**
 * @author Rizart Dokollari <r.dokollari@linkwi.se>
 * @since 8/23/16
 */

namespace App;

class Bank
{
    /**
     * @param Expression $source
     * @param string $currency
     * @return Money|Expression
     */
    public function reduce(Expression $source, $currency)
    {
        if ($source instanceof Money) {
            return $source->reduce($currency);
        }

        return $source->reduce($currency);
    }
}