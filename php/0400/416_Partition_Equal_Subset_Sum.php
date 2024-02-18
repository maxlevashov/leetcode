<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums) 
    {
        $sum = array_sum($nums);
        
        if (($sum & 1) == 1) {
            return false;
        }
        $sum /= 2;
        $dp = array_fill(0, $sum + 1, false);
        $dp[0] = true;
        
        foreach ($nums as $num) {
            for ($i = $sum; $i > 0; $i--) {
                if ($i >= $num) {
                    $dp[$i] = $dp[$i] || $dp[$i - $num];
                }
            }
        }
        
        return $dp[$sum];
    }

}

