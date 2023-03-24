<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[][] $connections
     * @return Integer
     */
    function minReorder($n, $connections) 
    { 
        $adj = [];

        foreach ($connections as $vertex) {
            $adj[$vertex[0]][] = $vertex[1];
            $adj[$vertex[1]][] = -$vertex[0];
        }

        return $this->dfs($adj, $visited, 0);
    }

    protected function dfs(&$adj, &$visited, $from) 
    {
        $change = 0;
        $visited[$from] = true;

        foreach ($adj[$from] as $to) {
            $absTo = abs($to);
            if (!$visited[$absTo]) {
                $change += $this->dfs($adj, $visited, $absTo) + ($to > 0);
            }
        }

        return $change;
    }
}

