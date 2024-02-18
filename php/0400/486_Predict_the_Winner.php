<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function PredictTheWinner($nums) 
    {
        $n = count($nums);
        $dp = array_fill(0, $n, array_fill(0, $n, 0));
        for ($i = 0; $i < $n; ++$i) {
            $dp[$i][$i] = $nums[$i];
        }
        
        for ($diff = 1; $diff < $n; ++$diff) {
            for ($left = 0; $left < $n - $diff; ++$left) {
                $right = $left + $diff;
                $dp[$left][$right] = max(
                    $nums[$left] - $dp[$left + 1][$right],
                    $nums[$right] - $dp[$left][$right - 1]
                );
            }
        }
        
        return $dp[0][$n - 1] >= 0;
    }
}

