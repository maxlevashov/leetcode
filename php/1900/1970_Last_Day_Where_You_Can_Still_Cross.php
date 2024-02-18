<?php

class Solution 
{


    protected $directions = [[1, 0], [-1, 0], [0, 1], [0, -1]];

    /**
     * @param Integer $row
     * @param Integer $col
     * @param Integer[][] $cells
     * @return Integer
     */
    function latestDayToCross($row, $col, $cells) 
    {
        $left = 1;
        $right = $row * $col;
        
        while ($left < $right) {
            $mid = $right - intval(($right - $left) / 2);
            if ($this->canCross($row, $col, $cells, $mid)) {
                $left = $mid;
            } else {
                $right = $mid - 1;
            }
        }
        
        return $left;
    }

    /**
     * 
     * @param int $row
     * @param int $col
     * @param array $cells
     * @param int $day
     * @return bool
     */
    protected function canCross(
        int $row,
        int $col, 
        array $cells, 
        int $day
    ): bool {
        $grid = array_fill(0, $row, array_fill(0, $col, 0));
        $queue = new SplQueue();
        
        for ($i = 0; $i < $day; $i++) {
            $grid[$cells[$i][0] - 1][$cells[$i][1] - 1] = 1;
        }
        
        for ($i = 0; $i < $col; $i++) {
            if ($grid[0][$i] == 0) {
                $queue->push([0, $i]);
                $grid[0][$i] = -1;
            }
        }

        while (!$queue->isEmpty()) {
            $cur = $queue->pop();
            $r = $cur[0];
            $c = $cur[1];
            if ($r == $row - 1) {
                return true;
            }
            
            foreach ($this->directions as $dir) {
                $newRow = $r + $dir[0];
                $newCol = $c + $dir[1];
                if (
                    $newRow >= 0 
                    && $newRow < $row 
                    && $newCol >= 0 
                    && $newCol < $col 
                    && $grid[$newRow][$newCol] == 0
                ) {
                    $grid[$newRow][$newCol] = -1;
                    $queue->push([$newRow, $newCol]);
                }
            }
        }
        
        return false;
    }
}

