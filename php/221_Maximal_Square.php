<?php

class Solution 
{

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix) 
    {
        $height = count($matrix);
        $width = count($matrix[0]);
        $result = 0;
        $memo = array_fill(0, $height + 1, array_fill(0, $width + 1, 0));

        for ($i = 1; $i <= $height; $i++) {
            for ($j = 1; $j <= $width; $j++) {
                if ($matrix[$i - 1][$j - 1] == '1') {

                    $memo[$i][$j] = min(
                        min($memo[$i][$j - 1], $memo[$i - 1][$j - 1]), 
                        $memo[$i - 1][$j]
                    ) + 1;

                    $result = max($memo[$i][$j], $result);
                }
            }
        }

        return $result * $result;
    }
}

