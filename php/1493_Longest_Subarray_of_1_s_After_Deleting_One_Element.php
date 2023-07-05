<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestSubarray($nums) 
    {
        $n = count($nums);
        $left = 0;
        $zeros = 0;
        $result = 0;

        for ($right = 0; $right < $n; $right++) {
            if ($nums[$right] == 0) {
                $zeros++;
            }
            while ($zeros > 1) {
                if ($nums[$left] == 0) {
                    $zeros--;
                }
                $left++;
            }
            $result = max($result, $right - $left);
        }
        return $result;
    }
}

