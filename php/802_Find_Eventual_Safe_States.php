<?php

class Solution 
{

    /**
     * @param Integer[][] $graph
     * @return Integer[]
     */
    function eventualSafeNodes($graph) 
    {
        $visited = [];
        $dp = [];
        $result = [];
        $countGraph = count($graph);
        
        for ($i = 0; $i < $countGraph; $i++) {
            if ($visited[$i]) {
                if ($dp[$i]) {
                    $result[] = $i;
                }
            } elseif ($this->safeNodesRecursive($i, $graph, $visited, $dp)) {
                $result[] = $i;
            }
        }

        return $result;
    }

    protected function safeNodesRecursive(int $i, $graph, &$visited, &$dp) 
    {
        if ($visited[$i]) {
            return $dp[$i];
        }
        $visited[$i] = true;
        $check = true;

        foreach ($graph[$i] as $node) {
            $check = $check & $this->safeNodesRecursive($node, $graph, $visited, $dp);
        }

        return $dp[$i] = $check;
    }
}

