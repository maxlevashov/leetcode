<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer[] $cost
     * @return Integer
     */
    function minCost($nums, $cost) 
    {
        $left = min($nums);
        $right = max($nums);
       
        $result = 0;
        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            $cost1 = $this->getCost($nums, $cost, $mid);
            $cost2 = $this->getCost($nums, $cost, $mid + 1);
            $result = min($cost1, $cost2);
            if ($cost1 > $cost2) {
                $left = $mid + 1;                
            } else {
                $right = $mid;               
            }
        }

        return $result;
    }

    protected function getCost(array $nums, array $cost, $all) 
    {
        $totalCost = 0;

        for ($i = 0; $i < count($nums); $i++) {
            $totalCost += abs($nums[$i] - $all) * $cost[$i];
        }

        return $totalCost;
    }
}

