<?php

class Solution 
{

    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    function insert($intervals, $newInterval) 
    {
        $intervals[] = $newInterval;		
        usort($intervals, function($a, $b) {
            return $a[0] > $b[0];
        }); 
        
	$merged = [];
        $start = $intervals[0][0];
        $end = $intervals[0][1];
        
        foreach ($intervals as $interval) {
            if ($interval[0] <= $end)  {
                $end = max($interval[1], $end);
            } else {
                $merged[] = [$start, $end];
                $start = $interval[0];
                $end = $interval[1];
            }
        }
        $merged[] = [$start, $end];
	return $merged;
    }
}

