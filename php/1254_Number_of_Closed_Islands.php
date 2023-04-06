<?php

class Solution 
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function closedIsland($grid) 
    {
        $m = count($grid); 
        $n = count($grid[0]);
        for ($i = 0; $i < $m; $i++) {
            $this->dfs($i, 0, $grid);
            $this->dfs($i, $n - 1, $grid);
        }
        for ($j = 0; $j < $n; $j++) {
            $this->dfs(0, $j, $grid);
            $this->dfs($m - 1, $j, $grid);
        }
        
        $count = 0;
        for ($i = 1; $i < $m - 1; $i++) {
            for ($j = 1; $j < $n - 1; $j++) {
                if ($grid[$i][$j] == 0) {
                    $this->dfs($i, $j, $grid);
                    $count++;
                }
            }
        }
        return $count;
    }

    protected function dfs($i, $j, &$grid) 
    {
        $m = count($grid);
        $n = count($grid[0]);
        if (
            $i < 0 
            || $i >= $m 
            || $j < 0 
            || $j >= $n 
            || $grid[$i][$j] != 0
        ) {
            return;
        }

        $grid[$i][$j] = 1;
        $this->dfs($i + 1, $j, $grid);
        $this->dfs($i - 1, $j, $grid);
        $this->dfs($i, $j + 1, $grid);
        $this->dfs($i, $j - 1, $grid);
    }
}

