<?php

class Solution 
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function minTimeToVisitAllPoints($points) 
    {
        $result = 0;
        for ($i = 0; $i < count($points) - 1; $i++) {
            $currX = $points[$i][0];
            $currY = $points[$i][1];
            $targetX = $points[$i + 1][0];
            $targetY = $points[$i + 1][1];
            $result += max(abs($targetX - $currX), abs($targetY - $currY));
        }
        
        return $result;
    }
}

