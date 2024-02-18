<?php

class Solution 
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function countPaths($grid) 
    {
        $directions = [[0, 1], [0, -1], [1, 0], [-1, 0]];
        $m = count($grid);
        $n = count($grid[0]);
        $mod = 1000000007;
        
        $dp = array_fill(0, $m, array_fill(0, $n, 1));

        $cellList = array_fill(0, $m * $n, array_fill(0, 2, 0));
        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                $index = $i * $n + $j;
                $cellList[$index][0] = $i;
                $cellList[$index][1] = $j;
            }      
        }
       
        usort($cellList, function($a, $b) use ($grid) { 
            return $grid[$a[0]][$a[1]] < $grid[$b[0]][$b[1]] ? -1 : 1;
        });
        
        foreach ($cellList as $cell) {
            $i = $cell[0];
            $j = $cell[1];

            foreach ($directions as $d) {
                $currI = $i + $d[0];
                $currJ = $j + $d[1];
                if (
                    0 <= $currI 
                    && $currI < $m 
                    && 0 <= $currJ 
                    && $currJ < $n
                    && $grid[$currI][$currJ] > $grid[$i][$j]
                ) {
                    $dp[$currI][$currJ] += $dp[$i][$j];
                    $dp[$currI][$currJ] %= $mod;
                }
            }
        }
        
        $answer = 0;
        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                $answer += $dp[$i][$j];
                $answer %= $mod;
            }
        }

        return $answer;
    }
}

