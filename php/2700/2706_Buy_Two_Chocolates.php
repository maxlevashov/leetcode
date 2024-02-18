<?php

class Solution 
{

    /**
     * @param Integer[] $prices
     * @param Integer $money
     * @return Integer
     */
    function buyChoco($prices, $money) 
    {
        $minIndex = $this->indexMinimum($prices);
        $minCost = $prices[$minIndex];
        $prices[$minIndex] = PHP_INT_MAX;
        $secondMinIndex = $this->indexMinimum($prices);
        $minCost += $prices[$secondMinIndex];

        if ($minCost <= $money) {
            return $money - $minCost;
        }

        return $money;
    }

    protected function indexMinimum(&$arr) 
    {
        $minIndex = 0;

        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i] < $arr[$minIndex]) {
                $minIndex = $i;
            }
        }

        return $minIndex;
    }
}

