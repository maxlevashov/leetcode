<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxFrequency($nums, $k) 
    {
        sort($nums);
        $left = 0;
        $result = 0;
        $curr = 0;
        
        for ($right = 0; $right < count($nums); $right++) {
            $target = $nums[$right];
            $curr += $target;
            
            while (($right - $left + 1) * $target - $curr > $k) {
                $curr -= $nums[$left];
                $left++;
            }
            
            $result = max($result, $right - $left + 1);
        }
        
        return $result;
    }
}

