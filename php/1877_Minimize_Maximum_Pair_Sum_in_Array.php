<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minPairSum($nums) 
    {
        sort($nums);
        $n = count($nums);
        $half = $n >> 1;
        
        $maxSum = 0;
        for ($i = 0; $i < $half; $i++) {
            $maxSum = max($maxSum, $nums[$i] + $nums[$n - 1 - $i]);
        }
        
        return $maxSum;
    }
}

