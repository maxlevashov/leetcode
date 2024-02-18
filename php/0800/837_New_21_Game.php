<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer $k
     * @param Integer $maxPts
     * @return Float
     */
    function new21Game($n, $k, $maxPts) 
    {
        if ($k == 0) {
            return 1.0; 
        }
        if ($n >= $k - 1 + $maxPts) {
            return 1.0;
        }
        $dp = array_fill(0, $n + 1, 0.0);
        $probability = 0.0;
        $windowSum = 1.0;
        $dp[0] = 1.0;

        for ($i = 1; $i <= $n; $i++) {
            $dp[$i] = $windowSum / $maxPts;

            if ($i < $k) {
                $windowSum += $dp[$i];
            } else {
                $probability += $dp[$i];
            }
            
            if ($i >= $maxPts) {
                $windowSum -= $dp[$i - $maxPts];
            }
        }

        return $probability;
    }
}

