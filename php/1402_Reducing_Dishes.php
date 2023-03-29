<?php

class Solution 
{

    /**
     * @param Integer[] $satisfaction
     * @return Integer
     */
    function maxSatisfaction($satisfaction) 
    {
        rsort($satisfaction);
        $satisfactionCount = count($satisfaction);
        $tempSum = 0;
        $totalSum = 0;
        foreach ($satisfaction as $dish) {
            $tempSum += $dish;
            if ($tempSum < 0) {
                break;
            }
            $totalSum += $tempSum;
        }

        return $totalSum;
    }
}

