<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function largestSubmatrix($matrix) 
    {
        $m = count($matrix);
        $n = count($matrix[0]);
        $ans = 0;
        
        for ($row = 0; $row < $m; $row++) {
            for ($col = 0; $col < $n; $col++) {
                if ($matrix[$row][$col] != 0 && $row > 0) {
                    $matrix[$row][$col] += $matrix[$row - 1][$col];
                }
            }
            
            $currRow = $matrix[$row];
            rsort($currRow);
            for ($i = 0; $i < $n; $i++) {
                $ans = max($ans, $currRow[$i] * ($i + 1));
            }
        }
        
        return $ans;
    }
}

