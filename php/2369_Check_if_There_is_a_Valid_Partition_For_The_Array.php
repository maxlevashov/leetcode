<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function validPartition($nums) 
    {
        $n = count($nums);
        $dp = array_fill(0, $n + 1, false);
        $dp[0] = true;


        for ($i = 0; $i < $n; $i++) {
            $dpIndex = $i + 1;

            if (
                $i > 0 
                && $nums[$i] == $nums[$i - 1]
            ) {
                $dp[$dpIndex] |= $dp[$dpIndex - 2];
            }
            if (
                $i > 1 
                && $nums[$i] == $nums[$i - 1] 
                && $nums[$i] == $nums[$i - 2]
            ) {
                $dp[$dpIndex] |= $dp[$dpIndex - 3];
            }
            if (
                $i > 1 
                && $nums[$i] == $nums[$i - 1] + 1 
                && $nums[$i] == $nums[$i - 2] + 2
            ) {
                $dp[$dpIndex] |= $dp[$dpIndex - 3];
            }
        }

        return $dp[$n];
    }
}

