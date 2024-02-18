<?php

class Solution 
{

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) 
    {
        $triangleCount = count($triangle);
        $nextRow = $triangle[$triangleCount - 1];
        $currRow = array_fill(0, $triangleCount, 0);
        for ($i = $triangleCount - 2; $i >= 0; $i--) {
            for ($j = 0; $j < $i + 1; $j++) {
                $lowerLeft = $triangle[$i][$j] + $nextRow[$j];
                $lowerRight = $triangle[$i][$j] + $nextRow[$j + 1];
                $currRow[$j] = min($lowerRight, $lowerLeft);
            }
            $this->swap($currRow, $nextRow);
        }

        return $nextRow[0]; 
    }

    protected function swap(&$a, &$b) {
        list($a, $b) = [$b, $a];
    }
}

