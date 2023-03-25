<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        $minPrice = PHP_INT_MIN;
        $profitMax = 0;
        foreach ($prices as $price) {
            $minPricePrevious = $minPrice;
            $profitMaxPrevious = $profitMax;
            $minPrice = max($minPricePrevious, $profitMaxPrevious - $price);
            $profitMax = max($profitMaxPrevious, $minPricePrevious + $price);
        }

        return $profitMax;
    }

}
