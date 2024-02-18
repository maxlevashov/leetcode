<?php

class Solution 
{

    protected $count = 1;
    protected $result = 0;
    protected $heihgt = 0;
    protected $width = 0;

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function uniquePathsIII($grid) 
    {
        $this->height = count($grid);
        $this->width = count($grid[0]);
        $x = 0;
        $y = 0;
        for ($i = 0; $i < $this->height; $i++) {
            for ($j = 0; $j < $this->width; $j++) {
                if ($grid[$i][$j] == 1) {
                    $x = $i;
                    $y = $j;
                } elseif ($grid[$i][$j] == 0) {
                    $this->count++;
                }
            }
        }

        $this->dfs($grid, $x, $y, 0);

        return $this->result;   
    }

    /**
     * 
     * @param type $grid
     * @param int $i
     * @param int $j
     * @param int $count
     * @return type
     */
    protected function dfs(&$grid, int $i, int $j, int $count) 
    {
        if (
            $i < 0 
            || $i >= $this->height 
            || $j < 0 
            || $j >= $this->width 
            || $grid[$i][$j] == -1
        ) {
            return;
        }

        if ($grid[$i][$j] == 2) {
            if ($count == $this->count) {
                $this->result++;
            }
            return;
        }
        $grid[$i][$j] = -1;
        $count++;
        $this->dfs($grid, $i + 1, $j, $count);
        $this->dfs($grid, $i - 1, $j, $count);
        $this->dfs($grid, $i, $j + 1, $count);
        $this->dfs($grid, $i, $j - 1, $count);
        $grid[$i][$j] = 0;
    }
}

