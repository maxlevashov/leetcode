<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumReplacement($nums) 
    {
        $operations = 0;
        $prevBound = $nums[count($nums) - 1];
        
        for ($i = count($nums) - 2; $i >= 0; --$i) {
            $num = $nums[$i];
            $noOfTimes = intval(($num + $prevBound - 1) / $prevBound);
            $operations += $noOfTimes - 1;
            $prevBound = intval($num / $noOfTimes);
        }
        
        return $operations;
    }
}

