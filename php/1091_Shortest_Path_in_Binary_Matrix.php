<?php

class Solution 
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function shortestPathBinaryMatrix($grid) 
    {
        $n = count($grid);
        if ($grid[0][0] == 1 || $grid[$n - 1][$n - 1] == 1) {
            return -1;
        }

        $queue = new SplQueue();
        $queue->enqueue([0, 0, 1]);
        $grid[0][0] = 1;

        $directions = [
            [-1, -1], [-1, 0], [-1, 1],
            [0, -1],           [0, 1],
            [1, -1],  [1, 0],  [1, 1],
        ];

        while (!$queue->isEmpty()) {
            $current = $queue->dequeue();
            $row = $current[0];
            $col = $current[1];
            $distance = $current[2];

            if ($row == $n - 1 && $col == $n - 1) {
                return $distance;
            }

            foreach ($directions as $direction) {
                $newRow = $row + $direction[0];
                $newCol = $col + $direction[1];

                if (
                    $newRow >= 0 
                    && $newRow < $n 
                    && $newCol >= 0 
                    && $newCol < $n 
                    && $grid[$newRow][$newCol] == 0
                ) {
                    $grid[$newRow][$newCol] = 1;
                    $queue->enqueue([$newRow, $newCol, $distance + 1]);
                }
            }
        }
        
        return -1;
    }
}

