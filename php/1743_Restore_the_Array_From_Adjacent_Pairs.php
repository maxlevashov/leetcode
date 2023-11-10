<?php

class Solution 
{
    protected array $graph = [];

    /**
     * @param Integer[][] $adjacentPairs
     * @return Integer[]
     */
    function restoreArray($adjacentPairs) 
    {
        foreach ($adjacentPairs as $edge) {
            $this->graph[$edge[0]][] = $edge[1];
            $this->graph[$edge[1]][] = $edge[0];
        }
        
        $root = 0;
        foreach ($this->graph as $key => $pair) {
            if (count($pair) == 1) {
                $root = $key;
                break;
            }
        }
        
        $result = [];
        $this->dfs($root, PHP_INT_MAX, $result);
  
        return $result;
    }

    protected function dfs($node, $prev, &$result) 
    {
        $result[] = $node;
        foreach ($this->graph[$node] as $neighbor) {
            if ($neighbor != $prev) {
                $this->dfs($neighbor, $node, $result);
            }
        }
    }
}

