<?php

class Solution 
{

    /**
     * @param Integer $k
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($k, $prices) 
    {
        if ($k == 0) {
            return 0;
        }

        $memo = array_fill(0, $k + 1, [0, 0]);

        for ($i = 0; $i <= $k; $i++) { 
            $memo[$i][0] = PHP_INT_MAX;
        }
        foreach ($prices as $price) {
            for ($i = 1; $i <= $k; $i++) {

                $memo[$i][0] = min($memo[$i][0], $price - $memo[$i - 1][1]);

                $memo[$i][1] = max($memo[$i][1], $price - $memo[$i][0]);
            }
        }

        return $memo[$k][1];
    }
}

