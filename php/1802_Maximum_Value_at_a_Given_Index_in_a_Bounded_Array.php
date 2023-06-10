<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer $index
     * @param Integer $maxSum
     * @return Integer
     */
    function maxValue($n, $index, $maxSum) 
    {
        $left = 1;
        $right = $maxSum;

        while ($left < $right) {
            $mid = ceil(($left + $right + 1) / 2);
            if ($this->getSum($index, $mid, $n) <= $maxSum) {
                $left = $mid;
            } else {
                $right = $mid - 1;
            }
        }
        
        return $left;
    }

    /**
     * 
     * @param int $index
     * @param int $value
     * @param int $n
     * @return int
     */
    protected function getSum(int $index, int $value, int $n): int
    {
        $count = 0;
        
        if ($value > $index) {
            $count += ($value + $value - $index) * ($index + 1) / 2;
        } else {
            $count += ($value + 1) * $value / 2 + $index - $value + 1;
        }
 
        if ($value >= $n - $index) {
            $count += ($value + $value - $n + 1 + $index) * ($n - $index) / 2;
        } else {
            $count += ($value + 1) * $value / 2 + $n - $index - $value;
        }   
        
        return $count - $value;
        
    }
}

