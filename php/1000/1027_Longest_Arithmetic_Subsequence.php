<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestArithSeqLength($nums) 
    {
        $countNums = count($nums);
        $maxLength = 0;
        $dp = [];

        for ($right = 0; $right < $countNums; ++$right) {
            $dp[$right] = [];
            for ($left = 0; $left < $right; ++$left) {
                $diff = $nums[$left] - $nums[$right];
                $temp = isset($dp[$left][$diff]) ? $dp[$left][$diff] : 1;
                $dp[$right][$diff] = $temp + 1;
                $maxLength = max($maxLength, $dp[$right][$diff]);
            }
        }

        return $maxLength;
    }
}

