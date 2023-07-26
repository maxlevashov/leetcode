<?php

class Solution {

    /**
     * @param Integer[] $dist
     * @param Float $hour
     * @return Integer
     */
    function minSpeedOnTime($dist, $hour) 
    {
        $left = 1;
        $right = 1e7;
        $minSpeed = -1;
        
        while ($left <= $right) {
            $mid = intval(($left + $right) / 2);
            if ($this->timeRequired($dist, $mid) <= $hour) {
                $minSpeed = $mid;
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }

        return $minSpeed;
    }

    /**
     * 
     * @param array $dist
     * @param int $speed
     * @return float
     */
    protected function timeRequired(array &$dist, int $speed): float 
    {
        $time = 0.0;

        for ($i = 0; $i < count($dist); $i++) {
            $temp = $dist[$i] / $speed;
            $time += ($i == count($dist) - 1 ? $temp : ceil($temp));
        }

        return $time;
    }
}

