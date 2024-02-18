<?php

class Solution 
{

    /**
     * @param Integer[] $prices
     * @param Integer $fee
     * @return Integer
     */
    function maxProfit($prices, $fee) 
    {
        if (count($prices) <= 1) {
            return 0;
        }
        $days = count($prices);
        $buy = array_fill(0, $days, 0);
        $sell = array_fill(0, $days, 0);
        $buy[0] = -$prices[0] - $fee;

        for ($i = 1; $i < $days; $i++) {
            $buy[$i] = max($buy[$i - 1], $sell[$i - 1] - $prices[$i] - $fee); 
            $sell[$i] = max($sell[$i - 1], $buy[$i - 1] + $prices[$i]); 
        }

        return $sell[$days - 1];
    }
}

