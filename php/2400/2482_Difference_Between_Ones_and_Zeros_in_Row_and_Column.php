<?php

class Solution 
{

    /**
     * @param Integer[][] $grid
     * @return Integer[][]
     */
    function onesMinusZeros($grid) 
    {
        $m = count($grid);
        $n = count($grid[0]);
        
        $onesRow = array_fill(0, $m, 0);
        $onesCol = array_fill(0, $n, 0);
        
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $onesRow[$i] += $grid[$i][$j];
                $onesCol[$j] += $grid[$i][$j];
            }
        }
        
        $diff = array_fill(0, $m, array_fill(0, $n, 0));
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $diff[$i][$j] = 2 * $onesRow[$i] + 2 * $onesCol[$j] - $n - $m;
            }
        }
        
        return $diff;
    }
}

