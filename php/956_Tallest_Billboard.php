<?php

class Solution {

    /**
     * @param Integer[] $rods
     * @return Integer
     */
    function tallestBillboard($rods) {
        $sum = 0;
        foreach ($rods as $rod) {
            $sum += $rod;
        }
        $dp = array_fill(0, $sum + 1, -1);
        $dp[0] = 0;

        foreach ($rods as $rod) {
            $dpCopy = $dp;
            
            for ($i = 0; $i <= $sum - $rod; $i++) {
                if ($dpCopy[$i] < 0) {
                    continue;
                }
                $dp[$i + $rod] = max($dp[$i + $rod], $dpCopy[$i]);
                $dp[abs($i - $rod)] = max($dp[abs($i - $rod)], $dpCopy[$i] + min($i, $rod));
            }
        }

        return $dp[0];
    }
}$

