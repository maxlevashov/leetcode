<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function combinationSum4($nums, $target) 
    {
        $memo = array_fill(0, $target + 1, 0);
        $memo[0] = 1;
        $countNums = count($nums);

        for ($i = 1; $i < $target + 1; $i++) {
            for ($j = 0; $j < $countNums; $j++) {
                if ($i - $nums[$j] >= 0) {
                    $memo[$i] += $memo[$i - $nums[$j]];
                }
            }
        }

        return $memo[$target];
    }
}

