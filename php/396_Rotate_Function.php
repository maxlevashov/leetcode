<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxRotateFunction($nums) 
    {
        if (empty($nums)) {
            return 0;
        }
        $countNums = count($nums);
        $sum = 0;
        $function0 = 0;
        $max = PHP_INT_MIN;

        for ($i = 0; $i < $countNums; $i++) {
            $sum += $nums[$i];
            $function0 += $i * $nums[$i];
        }
        $dp[] = array_fill(0, $countNums, 0);
        $dp[0] = $max = $function0;
        
        for ($i = 1; $i < $countNums; $i++) {
            $dp[$i] = $dp[$i - 1] + $sum - $countNums * $nums[$countNums - $i];
            $max = max($max, $dp[$i]);
        }

        return $max;
    }
}
