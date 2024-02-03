<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer
     */
    function maxSumAfterPartitioning($arr, $k) 
    {
        $n = count($arr);
        $dp = array_fill(0, $n + 1, 0);
        
        for ($start = $n - 1; $start >= 0; $start--) {
            $currMax = 0;
            $end = min($n, $start + $k);

            for ($i = $start; $i < $end; $i++) {
                $currMax = max($currMax, $arr[$i]);
                $dp[$start] = max(
                    $dp[$start], 
                    $dp[$i + 1] + $currMax * ($i - $start + 1)
                );
            }
        }

        return $dp[0];
    }
}

