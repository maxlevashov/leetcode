<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer $m
     * @param Integer $k
     * @return Integer
     */
    function numOfArrays($n, $m, $k) 
    {
        $dp = array_fill(
            0, 
            $n + 1, 
            array_fill(
                0, 
                $m + 1, 
                array_fill(
                    0, 
                    $k + 1, 
                    0
                )
            )
        );
        define ('MOD', 1e9 + 7);
        
        for ($num = 0; $num < count($dp[0]); $num++) {
            $dp[$n][$num][0] = 1;
        }
        
        for ($i = $n - 1; $i >= 0; $i--) {
            for ($maxSoFar = $m; $maxSoFar >= 0; $maxSoFar--) {
                for ($remain = 0; $remain <= $k; $remain++) {
                    $result = 0;
                    for ($num = 1; $num <= $maxSoFar; $num++) {
                        $result = ($result + $dp[$i + 1][$maxSoFar][$remain]) % MOD;
                    }
                    
                    if ($remain > 0) {
                        for ($num = $maxSoFar + 1; $num <= $m; $num++) {
                            $result = ($result + $dp[$i + 1][$num][$remain - 1]) % MOD;
                        }
                    }
                    
                    $dp[$i][$maxSoFar][$remain] = $result;
                }
            }
        }

        return $dp[0][0][$k];
    }
}

