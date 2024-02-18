<?php

class Solution
{

    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    function minEatingSpeed($piles, $h)
    {
        $left = 1;
        $right = max($piles);

        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            if ($this->canEatAll($piles, $mid, $h)) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }

        return $left;
    }

    private function canEatAll($piles, $speed, $h)
    {
        $time = 0;

        foreach ($piles as $pile) {
            $time += intval(($pile - 1) / $speed + 1);
            if ($time > $h) {
                return false;
            }
        }

        return true;
    }

}
