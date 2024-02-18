<?php

class Solution 
{

    protected $dir = [0, 1, 0, -1, 0];

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function shortestBridge($grid) 
    {
        $pair = [];
        for ($i = 0; count($pair) == 0 && $i < count($grid); ++$i) {
            for ($j = 0; count($pair) == 0 && $j < count($grid[0]); ++$j) {
                $this->paint($grid, $i, $j, $pair);
            }
        }
        while (!empty($pair)) {
            $qpair1 = [];
            foreach ($pair as $item) {
                for ($d = 0; $d < 4; ++$d) {
                    $x = $item[0] + $this->dir[$d];
                    $y = $item[1] + $this->dir[$d + 1];
                    if (min($x, $y) >= 0 && max($x, $y) < count($grid)) {
                        if ($grid[$x][$y] == 1)
                            return $grid[$item[0]][$item[1]] - 2;
                        if ($grid[$x][$y] == 0) {
                            $grid[$x][$y] = $grid[$item[0]][$item[1]] + 1;
                            $pair1[] = [$x, $y];
                        }
                    }
                }
            }
            $this->swap($pair, $pair1);
        }

        return 0;
    }

    protected function paint(
        &$grid, 
        int $i, 
        int $j, 
        &$pair
    ) {
        if (
            min($i, $j) >= 0 
            && max($i, $j) < count($grid) 
            && $grid[$i][$j] == 1
        ) {
            $grid[$i][$j] = 2;
            $pair[] = [$i, $j];
            for ($d = 0; $d < 4; ++$d) {
                $this->paint($grid, $i + $this->dir[$d], $j + $this->dir[$d + 1], $pair);
            }
        }
    }

    protected function swap(&$a, &$b) 
    {
        list($a, $b) = [$b, $a];
    }
}


