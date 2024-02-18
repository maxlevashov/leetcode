<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function splitArray($nums, $k) 
    {
        $countNums = count($nums);
        $dp = array_fill(0, $countNums + 1, array_fill(0, $k + 1, PHP_INT_MAX));
        $dp[0][0] = 0;

        for ($i = 1; $i <= $countNums; $i++) {
            for ($j = 1; $j <= $k; $j++) {
                $current = 0;
                for ($l = $i; $l > 0; $l--) {
                    $current += $nums[$l - 1];
                    $dp[$i][$j] = min($dp[$i][$j], max($current, $dp[$l - 1][$j-1]));
                }
            }
        }

        return $dp[$countNums][$k];
    }
}

