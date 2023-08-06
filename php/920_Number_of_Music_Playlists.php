<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer $goal
     * @param Integer $k
     * @return Integer
     */
    function numMusicPlaylists($n, $goal, $k) 
    {
        $mod = 1_000_000_007;
        $dp = array_fill(0, $goal + 1, array_fill(0, $n + 1, 0));
        $dp[0][0] = 1;

        for ($i = 1; $i <= $goal; $i++) {
            for ($j = 1; $j <= min($i, $n); $j++) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1] * ($n - $j + 1) % $mod;
                if ($j > $k) {
                    $dp[$i][$j] = ($dp[$i][$j] + $dp[$i - 1][$j] * ($j - $k)) % $mod;
                }
            }
        }

        return (int) $dp[$goal][$n];
    }
}

