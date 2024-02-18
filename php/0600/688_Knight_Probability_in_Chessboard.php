<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @param Integer $row
     * @param Integer $column
     * @return Float
     */
    function knightProbability($n, $k, $row, $column) {
        $directions = [
            [1, 2], [1, -2], [-1, 2], [-1, -2],
            [2, 1], [2, -1], [-2, 1], [-2, -1]
        ];

        $dp = array_fill(
            0, 
            $k + 1, 
            array_fill(
                0, 
                $n, 
                array_fill(0, $n, 0.0)
            )
        );
        $dp[0][$row][$column] = 1;


        for ($moves = 1; $moves <= $k; $moves++) {
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    foreach ($directions as $direction) {
                        $prevI = $i - $direction[0];
                        $prevJ = $j - $direction[1];
                        if (
                            $prevI >= 0 
                            && $prevI < $n 
                            && $prevJ >= 0 
                            && $prevJ < $n
                        ) {
                            $dp[$moves][$i][$j] += $dp[$moves - 1][$prevI][$prevJ] / 8;
                        }
                    }
                }
            }
        }

        $totalProbability = 0;
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $totalProbability += $dp[$k][$i][$j];
            }
        }

        return $totalProbability;
    }
}

