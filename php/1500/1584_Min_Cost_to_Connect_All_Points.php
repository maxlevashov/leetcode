<?php

class Solution 
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function minCostConnectPoints($points) 
    {
        $size = count($points);
        $visited = array_fill(0, $size, false);
        for ($i = 0; $i < $size; ++$i) {
             $heapDict[$i] = PHP_INT_MAX; 
        }
        $heapDict[0] = 0;
        
        $minHeap = new SplPriorityQueue();
        $minHeap->insert([0, 0], 0);
        
        $mstWeight = 0;
        
        while (!$minHeap->isEmpty()) {
            list($w, $u) = $minHeap->extract();
            if ($visited[$u] || $heapDict[$u] < $w) {
                continue;
            }
            
            $visited[$u] = true;
            $mstWeight += $w;
            
            for ($v = 0; $v < $size; ++$v) {
                if (!$visited[$v]) {
                    $newDistance = $this->manhattanDistance($points[$u], $points[$v]);
                    if ($newDistance < $heapDict[$v]) {
                        $heapDict[$v] = $newDistance;
                        $minHeap->insert([$newDistance, $v], -$newDistance);
                    }
                }
            }
        }
        
        return $mstWeight;
    }

    protected function manhattanDistance(&$p1, &$p2) {
        return abs($p1[0] - $p2[0]) + abs($p1[1] - $p2[1]);
    }

}


