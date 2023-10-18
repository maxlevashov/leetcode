<?php

class Solution 
{

    protected $graph = [];
    protected $memo = [];

    /**
     * @param Integer $n
     * @param Integer[][] $relations
     * @param Integer[] $time
     * @return Integer
     */
    function minimumTime($n, $relations, $time) 
    {
        foreach ($relations as $edge) {
            $x = $edge[0] - 1;
            $y = $edge[1] - 1;
            $this->graph[$x][] = $y;
        }
        
        $this->memo = array_fill(0, $n, -1);
        $result = 0;
        for ($node = 0; $node < $n; $node++) {
            $result = max($result, $this->dfs($node, $time));
        }
        
        return $result;
    }

    protected function dfs(int $node, &$time) 
    {
        if ($this->memo[$node] != -1) {
            return $this->memo[$node];
        }
        
        if (empty($this->graph[$node])) {
            return $time[$node];
        }
        
        $result = 0;
        foreach ($this->graph[$node] as $neighbor) {
            $result = max($result, $this->dfs($neighbor, $time));
        }
        
        $this->memo[$node] = $time[$node] + $result;
        return $time[$node] + $result;
    }
}

