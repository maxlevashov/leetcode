<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        $width = count($grid);
        $height = count($grid[0]);
        $dp = array_fill(
            0, 
            $width, 
            array_fill(0, $height, 0)
        );
        $dp[0][0] = $grid[0][0];

        for ($i = 1; $i < $width; $i++) {
            $dp[$i][0] = $dp[$i - 1][0] + $grid[$i][0];
        }
        for ($j = 1; $j < $height; $j++) {
            $dp[0][$j] = $dp[0][$j - 1] + $grid[0][$j];
        }
        for ($i = 1; $i < $width; $i++) {
            for ($j = 1; $j < $height; $j++) {
                $dp[$i][$j] = min(
                    $dp[$i - 1][$j], 
                    $dp[$i][$j - 1]
                ) + $grid[$i][$j];
            }
        }
        
        return $dp[$width - 1][$height - 1];
    }
}
