<?php

class Solution 
{

    /**
     * @param Integer[] $cost
     * @param Integer[] $time
     * @return Integer
     */
    function paintWalls($cost, $time) 
    {
        $n = count($cost);
        $dp = array_fill(0, $n + 1, array_fill(0, $n + 1, 0));
        
        for ($i = 1; $i <= $n; $i++) {
            $dp[$n][$i] = (int) 1e9;
        }
        
        for ($i = $n - 1; $i >= 0; $i--) {
            for ($remain = 1; $remain <= $n; $remain++) {
                $paint = $cost[$i] + $dp[$i + 1][max(0, $remain - 1 - $time[$i])];
                $dontPaint = $dp[$i + 1][$remain];
                $dp[$i][$remain] = min($paint, $dontPaint);
            }
        }
        
        return $dp[0][$n];
    }
}

