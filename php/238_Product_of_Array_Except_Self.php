<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums) 
    {
        $numsCount = count($nums);
        $result = array_fill(0, $numsCount, 0);
        $result[0] = 1;

        for ($i = 1; $i < $numsCount; $i++) {
            $result[$i] = $result[$i - 1] * $nums[$i - 1];
        }

        $right = 1;
        for ($i = $numsCount - 1; $i >= 0; $i--) {
            $result[$i] *= $right;
            $right *= $nums[$i];
        }

        return $result;
    }
}

