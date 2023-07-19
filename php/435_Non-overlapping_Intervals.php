<?php

class Solution 
{

    protected 
    
    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function eraseOverlapIntervals($intervals) 
    {
        usort($intervals, function ($a, $b) {
            return $a[1] > $b[1];
        });
        $prev = 0;
        $count = 1;
        $countIntervals = count($intervals);
        
        for ($i = 0; $i < $countIntervals; $i++) {
            if ($intervals[$i][0] >= $intervals[$prev][1]) {
                $prev = $i;
                $count++;
            }
        }
        
        return $countIntervals - $count;
    }
 
}

