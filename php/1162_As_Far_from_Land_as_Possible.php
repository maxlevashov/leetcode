<?php

class Solution {

    const PAIR_DIRECTION = [[-1, 0], [1, 0], [0, -1], [0, 1]];

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxDistance($grid) {
        $visited = [];
        
        $queue = [];
        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[0]); $j++) {
                $visited[$i][$j] = $grid[$i][$j];
                if ($grid[$i][$j]) {
                    $queue[] = [$i, $j];
                }
            }
        }
        
        $distance = -1;
        while (!empty($queue)) {
            $queueCount = count($queue);
            
            while ($queueCount--) {
                $landCell = array_shift($queue);
                
                foreach (self::PAIR_DIRECTION as $pair) {
                    $x = $landCell[0] + $pair[0];
                    $y = $landCell[1] + $pair[1];
                    
                    if (
                        $x >= 0 
                        && $y >= 0 
                        && $x < count($grid) 
                        && $y < count($grid[0]) 
                        && $visited[$x][$y] == 0
                    ) {
                        $visited[$x][$y] = 1;
                        $queue[] = [$x, $y];
                    }
                }
            }
            
            $distance++;
        }
        
        return $distance == 0 ? -1 : $distance;
    }
}

