<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer $maxMove
     * @param Integer $startRow
     * @param Integer $startColumn
     * @return Integer
     */
    function findPaths($m, $n, $maxMove, $startRow, $startColumn) {
        $mod = 1000000000 + 7;
        $dp = array_fill(0, $m, array_fill(0, $n, 0));
        $dp[$startRow][$startColumn] = 1;
        $count = 0;

        for ($moves = 1; $moves <= $maxMove; $moves++) {
            $temp = array_fill(0, $m, array_fill(0, $n, 0));
            for ($i = 0; $i < $m; $i++) {
                for ($j = 0; $j < $n; $j++) {
                if ($i == $m - 1) {
                    $count = ($count + $dp[$i][$j]) % $mod;
                }
                if ($j == $n - 1) {
                    $count = ($count + $dp[$i][$j]) % $mod;
                }
                if ($i == 0) {
                    $count = ($count + $dp[$i][$j]) % $mod; 
                }
                if ($j == 0) {
                    $count = ($count + $dp[$i][$j]) % $mod;
                }
                $temp[$i][$j] = (
                    (
                        ($i > 0 ? $dp[$i - 1][$j] : 0) 
                        + ($i < $m - 1 ? $dp[$i + 1][$j] : 0)
                    ) % $mod 
                    + (
                        ($j > 0 ? $dp[$i][$j - 1] : 0) 
                        + ($j < $n - 1 ? $dp[$i][$j + 1] : 0)
                    ) % $mod
                ) % $mod;
                }
            }
            $dp = $temp;
        }

        return $count;
    }
}

