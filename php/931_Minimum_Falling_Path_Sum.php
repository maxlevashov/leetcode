<?php

class Solution 
{

    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function minFallingPathSum($matrix) 
    {
        if (count($matrix) == 1) {
            return $matrix[0][0];
        }
        $n = count($matrix);
        $dp = $matrix; 
        
        for ($i = $n - 2; $i >= 0; $i--) {
            for ($j = 0; $j < $n; $j++) {
                $minPath = $dp[$i + 1][$j];
                if ($j > 0) {
                    $minPath = min($minPath, $dp[$i + 1][$j - 1]);
                }
                if ($j < $n - 1) {
                    $minPath = min($minPath, $dp[$i + 1][$j + 1]);
                }
                $dp[$i][$j] += $minPath;
            }
        }

        $result = PHP_INT_MAX;
        foreach ($dp[0] as $num) {
            $result = min($result, $num);
        }
        
        return $result;
    }
}

