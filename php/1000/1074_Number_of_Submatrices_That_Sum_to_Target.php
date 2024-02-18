<?php

class Solution 
{

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Integer
     */
    function numSubmatrixSumTarget($matrix, $target) 
    {
        $m = count($matrix);
        $n = count($matrix[0]);

        for ($row = 0; $row < $m; $row++) {
            for ($col = 1; $col < $n; $col++) {
                $matrix[$row][$col] += $matrix[$row][$col - 1];
            }
        }

        $count = 0;

        for ($c1 = 0; $c1 < $n; $c1++) {
            for ($c2 = $c1; $c2 < $n; $c2++) {
                $map = [];
                $map[0] = 1;
                $sum = 0;

                for ($row = 0; $row < $m; $row++) {
                    $sum += $matrix[$row][$c2] - (
                        $c1 > 0 ? $matrix[$row][$c1 - 1] : 0
                    );
                    $count += $map[$sum - $target];
                    $map[$sum]++;
                }
            }
        }

        return $count;
    }
}

