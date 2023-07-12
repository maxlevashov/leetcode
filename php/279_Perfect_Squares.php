<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function numSquares($n) 
    {
        $memo = array_fill(0, $n + 1, PHP_INT_MAX);
        $memo[0] = 0;

        for ($i = 1; $i <= $n; $i++) {
            for ($j = 0; $j * $j <= $i; $j++) {
                $memo[$i] = min($memo[$i], 1 + $memo[$i - $j * $j]);
            }
        }

        return $memo[$n];
    }
}

