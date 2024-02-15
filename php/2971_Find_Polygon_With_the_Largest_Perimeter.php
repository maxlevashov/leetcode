<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function largestPerimeter($nums) 
    {
        $sum = 0;
        sort($nums);
        foreach ($nums as $num) {
            $sum += $num;
        }
        $n = count($nums);
        
        for ($i = $n - 1; $i >= 2; $i--) {
            $sum -= $nums[$i];
            if ($sum > $nums[$i]) {
                return $sum + $nums[$i];
            }
        }

        return -1;
    }
}

