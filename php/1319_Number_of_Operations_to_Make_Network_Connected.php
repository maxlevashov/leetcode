<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[][] $connections
     * @return Integer
     */
    function makeConnected($n, $connections) 
    {
        if (count($connections) < $n - 1) {
            return -1;
        }

        $adj = [];
        foreach ($connections as $vertex) {
            $adj[$vertex[0]][] = $vertex[1];
            $adj[$vertex[1]][] = $vertex[0];
        }
        $visited = array_fill(0, $n, false);
        $components = 0;
        for ($i = 0; $i < $n; $i++) {
            if (!$visited[$i]) {
                $this->dfs($adj, $visited, $i);
                $components++;
            }
        }
        return $components - 1;
    }

    protected function dfs(&$adj, &$visited, $src)
    {
        $visited[$src] = true;
        foreach ($adj[$src] as $item) {
            if (!$visited[$item]) {
                $this->dfs($adj, $visited, $item);
            }
        }
    }
}
