<?php

class Solution 
{

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) 
    {
        $colZero = 1;
        $rows = count($matrix);
        $cols = count($matrix[0]);

        for ($i = 0; $i < $rows; $i++) {
            if ($matrix[$i][0] == 0) { 
                $colZero = 0;
            }
            for ($j = 1; $j < $cols; $j++) {
                if ($matrix[$i][$j] == 0) {
                    $matrix[$i][0] = $matrix[0][$j] = 0;
                }
            }
        }

        for ($i = $rows - 1; $i >= 0; $i--) {
            for ($j = $cols - 1; $j >= 1; $j--) {
                if ($matrix[$i][0] == 0 || $matrix[0][$j] == 0){
                    $matrix[$i][$j] = 0;
                }
            }
            if ($colZero == 0) {
                $matrix[$i][0] = 0;
            }
        }
    }
}

