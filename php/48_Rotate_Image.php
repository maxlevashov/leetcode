<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix)
    {
        $matrixCount = count($matrix);
        for ($i = 0; $i < $matrixCount; ++$i) {
            for ($j = $i; $j < $matrixCount; ++$j) {
                $this->swap($matrix[$i][$j], $matrix[$j][$i]);
            }
        }

        for ($i = 0; $i < $matrixCount; ++$i) {
            $left = 0;
            $right = $matrixCount - 1;
            while ($left < $right) {
                $this->swap($matrix[$i][$left], $matrix[$i][$right]);
                ++$left;
                --$right;
            }
        }
    }

    protected function swap(&$x, &$y)
    {
        list($x, $y) = [$y, $x];
    }

}
