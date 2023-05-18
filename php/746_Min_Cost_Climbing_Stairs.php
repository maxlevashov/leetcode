<?php

class Solution 
{

    /**
     * @param Integer[] $cost
     * @return Integer
     */
    function minCostClimbingStairs($cost) 
    {
        $costCount = count($cost);

        for ($i = 2; $i < $costCount; $i++) {
            $cost[$i] += min($cost[$i - 1], $cost[$i - 2]);
        }

        return min($cost[$costCount - 1], $cost[$costCount - 2]);
    }
}

