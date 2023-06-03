<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $headID
     * @param Integer[] $manager
     * @param Integer[] $informTime
     * @return Integer
     */
    function numOfMinutes($n, $headID, $manager, $informTime) 
    {
        $graph = [];

        for ($i = 0; $i < count($manager); $i++) {
            $j = $manager[$i];
            if (!isset($graph[$j])) {
                $graph[$j] = [];
            }
            $graph[$j][] = $i;
        }

        return $this->dfs($graph, $informTime, $headID);
    }
    
    /**
     * 
     * @param array $graph
     * @param array $informTime
     * @param int $currentNode
     * @return int
     */
    protected function dfs(array $graph, array $informTime, int $currentNode): int 
    {
        $max = 0;
        if (!isset($graph[$currentNode])) {
            return $max;
        }

        for ($i = 0; $i < count($graph[$currentNode]); $i++) {
            $max = max($max, $this->dfs($graph, $informTime, $graph[$currentNode][$i]));
        }

        return $max + $informTime[$currentNode];
    }
}

