<?php

class Solution
{

    /**
     * @param Integer[] $weights
     * @param Integer $days
     * @return Integer
     */
    function shipWithinDays($weights, $days)
    {
        $totalLoad = 0;
        $maxLoad = 0;
        foreach ($weights as $weight) {
            $totalLoad += $weight;
            $maxLoad = max($maxLoad, $weight);
        }

        $left = $maxLoad;
        $right = $totalLoad;

        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            if ($this->feasible($weights, $mid, $days)) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }
        return $left;
    }

    protected function feasible($weights, $c, $days)
    {
        $daysNeeded = 1;
        $currentLoad = 0;
        foreach ($weights as $weight) {
            $currentLoad += $weight;
            if ($currentLoad > $c) {
                $daysNeeded++;
                $currentLoad = $weight;
            }
        }

        return $daysNeeded <= $days;
    }

}
