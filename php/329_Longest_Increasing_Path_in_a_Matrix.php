<?php

class Solution 
{

    protected $dp = [];
    protected $height = 0;
    protected $width = 0;

    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function longestIncreasingPath($matrix) {
        $maxVal = 0;
        $this->height = count($matrix);
        $this->width = count($matrix[0]);
        
        for ($i = 0; $i < $this->height; $i++) {
            for ($j = 0; $j < $this->width; $j++) {
                $maxVal = max($maxVal, $this->dfs($matrix, $i, $j, -1));
            }
        }

        return $maxVal;
    }

    /**
     * 
     * @param array $matrix
     * @param int $i
     * @param int $j
     * @param int $prev
     * @return int
     */
    protected function dfs(array &$matrix, int $i, int $j, int $prev) 
    {
        if (
            $i < 0 
            || $j < 0 
            || $i == $this->height 
            || $j == $this->width 
            || $prev >= $matrix[$i][$j]
        ) {
            return 0;
        }
        if ($this->dp[$i][$j]) {
            return $this->dp[$i][$j];
        }

        $left = $this->dfs($matrix, $i, $j - 1, $matrix[$i][$j]);
        $right = $this->dfs($matrix, $i, $j + 1, $matrix[$i][$j]);
        $up = $this->dfs($matrix, $i - 1, $j, $matrix[$i][$j]);
        $down = $this->dfs($matrix, $i + 1, $j, $matrix[$i][$j]);

        return $this->dp[$i][$j] = max([$left, $right, $up, $down]) + 1;
    }
}

