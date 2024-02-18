<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function kInversePairs($n, $k) 
    {
        $mod = 1000000007;
        $dp = array_fill(0, $n + 1, array_fill(0, $k + 1, 0));

        for ($i = 1; $i <= $n; $i++) {
            for ($j = 0; $j <= $k; $j++) {
                if ($j == 0) {
                    $dp[$i][$j] = 1;
                } else {
                    $val = (
                        $dp[$i - 1][$j] + $mod - (
                            $j - $i >= 0 
                            ? $dp[$i - 1][$j - $i] 
                            : 0
                        )
                    ) % $mod;
                    $dp[$i][$j] = ($dp[$i][$j - 1] + $val) % $mod;
                }
            }
        }

        return (
            $dp[$n][$k] + $mod - (
                $k > 0 ? $dp[$n][$k - 1] : 0
            )
        ) % $mod;
    }
}

