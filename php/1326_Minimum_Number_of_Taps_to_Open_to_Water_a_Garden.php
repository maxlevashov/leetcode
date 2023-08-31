<?php

class Solution 
{

    const INF = 1e9;

    /**
     * @param Integer $n
     * @param Integer[] $ranges
     * @return Integer
     */
    function minTaps($n, $ranges) 
    {
        $dp = array_fill(0, $n + 1, self::INF);
        $dp[0] = 0;
        
        for ($i = 0; $i <= $n; $i++) {
            $tapStart = max(0, $i - $ranges[$i]);
            $tapEnd = min($n, $i + $ranges[$i]);
            for ($j = $tapStart; $j <= $tapEnd; $j++) {
               $dp[$tapEnd] = min($dp[$tapEnd], $dp[$j] + 1);
            }
        }
        
        if ($dp[$n] == self::INF) {
            return -1;
        }
        
        return $dp[$n];
    }
}

