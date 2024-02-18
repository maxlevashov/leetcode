<?php

class Solution 
{

    protected $maxLength = -1;
     
    /**
     * @param Integer[] $edges
     * @return Integer
     */
    function longestCycle($edges) 
    {
        $visited = [];
        
        for ($i = 0; $i < count($edges); $i++) {
            if ($visited[$i]) {
                continue;
            }
            $dist = [];
            $dist[$i] = 1;
            $this->dfs($i, $edges, $dist, $visited);
        }
        
        return $this->maxLength;
    }

    protected function dfs($node, &$edges, &$dist, &$visited)
    {

        $visited[$node] = true;
        $neighbor = $edges[$node];

        if ($neighbor != -1 && !$visited[$neighbor]) {
            $dist[$neighbor] = $dist[$node] + 1;
            $this->dfs($neighbor, $edges, $dist, $visited);
        } else if ($neighbor != -1 && $dist[$neighbor]) {
            $this->maxLength = max($this->maxLength, $dist[$node] - $dist[$neighbor] + 1);
        }
        
        return ;
        
    }
}

