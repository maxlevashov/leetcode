<?php

class Solution 
{

    /**
     * @param Integer $amount
     * @param Integer[] $coins
     * @return Integer
     */
    function change($amount, $coins) 
    {
        $n = count($coins);
        $dp = [];
        $dp[0] = 1;

        for ($i = $n - 1; $i >= 0; $i--) {
            for ($j = $coins[$i]; $j <= $amount; $j++) {
                $dp[$j] += $dp[$j - $coins[$i]];
            }
        }

        return $dp[$amount];
    }
}

