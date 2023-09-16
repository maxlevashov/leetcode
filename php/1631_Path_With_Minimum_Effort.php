<?php

class Solution 
{

    /**
     * @param Integer[][] $heights
     * @return Integer
     */
    function minimumEffortPath($heights) 
    {
        $rows = count($heights);
        $cols = count($heights[0]);
        $dist = array_fill(0, $rows, array_fill(0, $cols, PHP_INT_MAX));
        $minHeap = new SplPriorityQueue();
        $minHeap->insert([0, 0, 0], 0);
        $dist[0][0] = 0;
        $directions = [[0, 1], [0, -1], [1, 0], [-1, 0]];

        while (!$minHeap->isEmpty()) {
            list($effort, $x, $y) = $minHeap->extract();

            if ($effort > $dist[$x][$y]) {
                continue;
            }
            if ($x == $rows - 1 && $y == $cols - 1) {
                return $effort;
            }
            foreach ($directions as $direction) {
                $nx = $x + $direction[0];
                $ny = $y + $direction[1];
                if (
                    $nx >= 0 
                    && $nx < $rows 
                    && $ny >= 0 
                    && $ny < $cols)
                {
                    $newEffort = max($effort, abs($heights[$x][$y] - $heights[$nx][$ny]));
                    if ($newEffort < $dist[$nx][$ny]) {
                        $dist[$nx][$ny] = $newEffort;
                        $minHeap->insert([$newEffort, $nx, $ny], -$newEffort);
                    }
                }
            }
        }
        return -1;
    }
}

