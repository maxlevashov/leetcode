<?php

class Solution
{

    /**
     * @param Integer[] $time
     * @param Integer $totalTrips
     * @return Integer
     */
    function minimumTime($time, $totalTrips)
    {
        $left = 0;
        $right = PHP_INT_MAX;

        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            $trips = 0;
            foreach ($time as $item) {
                $trips += intval($mid / $item);
            }
            if ($trips < $totalTrips) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }

        return $left;
    }

}
