<?php

class Solution {

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid) {
        $width = count($obstacleGrid[0]);
        $dp = array_fill(0, $width, 0);
        $dp[0] = 1;
        
        foreach ($obstacleGrid as $row) {
            for ($j = 0; $j < $width; $j++) {
                if ($row[$j] == 1) {
                    $dp[$j] = 0;
                } else if ($j > 0) {
                    $dp[$j] += $dp[$j - 1];
                }
            }
        }

        return $dp[$width - 1];
    }
}

