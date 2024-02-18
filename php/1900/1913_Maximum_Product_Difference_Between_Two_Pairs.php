<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProductDifference($nums) 
    {
        $biggest = 0;
        $secondBiggest = 0;
        $smallest = PHP_INT_MAX;
        $secondSmallest = PHP_INT_MAX;
        
        foreach ($nums as $num) {
            if ($num > $biggest) {
                $secondBiggest = $biggest;
                $biggest = $num;
            } else {
                $secondBiggest = max($secondBiggest, $num);
            }
            
            if ($num < $smallest) {
                $secondSmallest = $smallest;
                $smallest = $num;
            } else {
                $secondSmallest = min($secondSmallest, $num);
            }
        }
        
        return $biggest * $secondBiggest - $smallest * $secondSmallest;
    }
}

