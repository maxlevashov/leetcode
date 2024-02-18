<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function wiggleMaxLength($nums) 
    {
        $countNums = count($nums);
        if ($countNums  < 2) {
            return $countNums ;
        }
        $up = [];
        $down = [];
        
        for ($i = 1; $i < $countNums; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($nums[$i] > $nums[$j]) {
                    $up[$i] = max($up[$i], $down[$j] + 1);
                } elseif ($nums[$i] < $nums[$j]) {
                    $down[$i] = max($down[$i], $up[$j] + 1);
                }
            }
        }

        return 1 + max($down[$countNums - 1], $up[$countNums - 1]);
    }
}

