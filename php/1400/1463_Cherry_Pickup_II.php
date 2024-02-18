<?php

class Solution 
{

    protected array $memo = [];
    protected array $dy = [0, -1, 1];

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function cherryPickup($grid) 
    {
        $m = count($grid); 
        if (!$m) {
            return 0;
        }
        $n = count($grid[0]);
        $this->memo = array_fill(0, 71, array_fill(0, 71, array_fill(0, 71, -1)));
        return $this->dfs($grid, 0, 0, $n - 1, $m, $n);
    }

    protected function dfs(
        &$grid, int $i, int $c1, int $c2, int $m, int $n
    ) {

        if ($i == $m) {
            return 0;
        }
        if ($c1 < 0 || $c2 < 0 || $c1 >= $n || $c2 >= $n) {
            return PHP_INT_MIN;
        }
        if ($this->memo[$i][$c1][$c2] != -1) {
            return $this->memo[$i][$c1][$c2];
        }
        $result = 0;
        for ($k = 0; $k < 3; $k++) {
            for ($r = 0; $r < 3; $r++) {
                $result = max($result, $this->dfs(
                    $grid, $i + 1, $c1 + $this->dy[$k], $c2 + $this->dy[$r], $m, $n)
                );
            }
        }

        $result += ($c1 == $c2) ? $grid[$i][$c1] : $grid[$i][$c1] + $grid[$i][$c2];
        return $this->memo[$i][$c1][$c2] = $result;

    }
}

