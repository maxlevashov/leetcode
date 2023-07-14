<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxCoins($nums) 
    {
        $nums = $nums + [0, 0];
        $n = 1;
        foreach ($nums as $num) { 
            if ($num > 0) {
                $nums[$n++] = $num;
            }
        }
        $nums[0] = $nums[$n++] = 1;
        $dp = [];
        
        for ($k = 2; $k < $n; ++$k) {
            for ($left = 0; $left < $n - $k; ++$left) {
                $right = $left + $k;
                for ($i = $left + 1; $i < $right; ++$i) {
                    $dp[$left][$right] = max(
                        $dp[$left][$right], 
                        $nums[$left] * $nums[$i] * $nums[$right] 
                            + $dp[$left][$i] + $dp[$i][$right]
                    );
                }
            }
        }

        return $dp[0][$n - 1];
    }
}

