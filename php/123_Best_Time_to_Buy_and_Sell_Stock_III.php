<?php

class Solution 
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) 
    {
        $buy1 = PHP_INT_MAX; 
        $buy2 = PHP_INT_MAX;
        $sell1 = 0;
        $sell2 = 0;

        for ($i = 0; $i < count($prices); $i++) {
            $buy1 = min($buy1, $prices[$i]);
            $sell1 = max($sell1, $prices[$i] - $buy1);
            $buy2 = min($buy2, $prices[$i] - $sell1);
            $sell2 = max($sell2, $prices[$i] - $buy2);
        }

        return $sell2;
    }
}

