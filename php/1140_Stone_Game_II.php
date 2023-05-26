<?php

class Solution 
{

    /**
     * @param Integer[] $piles
     * @return Integer
     */
    function stoneGameII($piles) 
    {
        $pilesCount = count($piles);
        $dp = array_fill(0, $pilesCount + 1, array_fill(0, $pilesCount + 1, 0));
        $sufsum = array_fill(0, $pilesCount + 1, 0);

        for ($i = $pilesCount - 1; $i >= 0; $i--) {
            $sufsum[$i] = $sufsum[$i + 1] + $piles[$i];
        }
        for ($i = 0; $i <= $pilesCount; $i++) {
            $dp[$i][$pilesCount] = $sufsum[$i];
        }
        for ($i = $pilesCount - 1; $i >= 0; $i--) {
            for ($j = $pilesCount - 1; $j >= 1; $j--) {
                for ($X = 1; $X <= 2 * $j && $i + $X <= $pilesCount; $X++) {
                    $dp[$i][$j] = max($dp[$i][$j], $sufsum[$i] - $dp[$i + $X][max($j, $X)]);
                }
            }
        }

        return $dp[0][1];
    }
}

