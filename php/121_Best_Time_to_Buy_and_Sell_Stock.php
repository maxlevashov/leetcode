<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        $minPrice = PHP_INT_MAX;
        $profitMax = 0;
        foreach ($prices as $price) {
            if ($price < $minPrice) {
                $minPrice = $price;
            } elseif ($price - $minPrice > $profitMax) {
                $profitMax = $price - $minPrice;
            }
        }

        return $profitMax;
    }

}
