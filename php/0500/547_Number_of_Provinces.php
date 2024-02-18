<?php

class Solution 
{

    /**
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected) 
    {
        $visited = array_fill(0, count($isConnected), false);
        $count = 0;

        for ($i = 0; $i < count($isConnected); $i++) {
            if (!$visited[$i]) {
                $this->dfs($isConnected, $visited, $i);
                $count++;
            }
        }

        return $count;
    }
    
    /**
     * 
     * @param type $isConnected
     * @param array $visited
     * @param type $node
     * @return void
     */
    protected function dfs($isConnected, &$visited, $node): void
    {
        $visited[$node] = true;
        for ($j = 0; $j < count($isConnected); $j++) {
            if ($isConnected[$node][$j] == 1 && !$visited[$j]) {         
                $this->dfs($isConnected, $visited, $j);
            }
        }
    }
}
