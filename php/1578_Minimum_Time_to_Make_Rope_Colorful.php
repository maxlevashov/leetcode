<?php

class Solution 
{

    /**
     * @param String $colors
     * @param Integer[] $neededTime
     * @return Integer
     */
    function minCost($colors, $neededTime) 
    {
        $n = strlen($colors);
        $dp = array_fill(0, $n + 1, 0);
        $previousColor = 'A';
        $previousTime = 0;

        for ($i = 1; $i <= $n; $i++) {
            if ($colors[$i - 1] == $previousColor) {
                $dp[$i] = $dp[$i - 1] + min($neededTime[$i - 1], $previousTime);
                $previousTime = max($neededTime[$i - 1], $previousTime);
            } else {
                $dp[$i] = $dp[$i - 1];
                $previousColor = $colors[$i - 1];
                $previousTime = $neededTime[$i - 1];
            }
        }

        return $dp[$n];
    }
}

