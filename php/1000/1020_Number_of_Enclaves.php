<?php

class Solution {

    protected $height = 0;
    protected $width = 0;

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function numEnclaves($grid) 
    {
        $this->height = count($grid);
        $this->width = count($grid[0]);
        $result = 0;
        for ($i = 0; $i < $this->height; $i++) {
            for ($j = 0; $j < $this->width; $j++) {
                if ($i == 0 
                    || $j == 0 
                    || $i == $this->height - 1 
                    || $j == $this->width - 1
                ) {
                    $this->dfs($grid, $i, $j);
                }     
            }
        }
        
        for ($i = 0; $i < $this->height; $i++) {
            for ($j = 0; $j < $this->width; $j++) {
                if ($grid[$i][$j] == 1)
                    $result++;
            }
        }
        
        return $result;
    }
    
    protected function dfs(&$grid, $i, $j) 
    {
        if ($i >= 0 
            && $i <= $this->height - 1 
            && $j >= 0 
            && $j <= $this->width - 1 
            && $grid[$i][$j] == 1
        ) {
            $grid[$i][$j] = 0;
            $this->dfs($grid, $i + 1, $j);
            $this->dfs($grid, $i - 1, $j);
            $this->dfs($grid, $i, $j + 1);
            $this->dfs($grid, $i, $j - 1);
        }
    }
}

