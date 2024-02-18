<?php

class Solution 
{

    /**
     * @param Integer[] $salary
     * @return Float
     */
    function average($salary) 
    {
        $sum = array_sum($salary);
        $min = min($salary);
        $max = max($salary);     
        $n = count($salary);
           
        $sum -= $min;
        $sum -= $max;

        return $sum / ($n - 2);
    }
}

