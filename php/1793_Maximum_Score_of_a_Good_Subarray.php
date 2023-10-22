<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maximumScore($nums, $k) 
    {
        $n = count($nums);
        $left = $k;
        $right = $k;
        $ans = $nums[$k];
        $currMin = $nums[$k];
        
        while ($left > 0 || $right < $n - 1) {
            if (
                ($left > 0 ? $nums[$left - 1]: 0) 
                < ($right < $n - 1 ? $nums[$right + 1] : 0)
            ) {
                $right++;
                $currMin = min($currMin, $nums[$right]);
            } else {
                $left--;
                $currMin = min($currMin, $nums[$left]);
            }
            
            $ans = max($ans, $currMin * ($right - $left + 1));
        }
        
        return $ans;
    }
}

