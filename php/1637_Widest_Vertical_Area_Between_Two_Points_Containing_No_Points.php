<?php

class Solution 
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function maxWidthOfVerticalArea($points) 
    {
        sort($points);
        
        $ans = 0;
        for ($i = 1; $i < count($points); $i++) {
            $ans = max($ans, $points[$i][0] - $points[$i - 1][0]);
        }
        
        return $ans;
    }
}
