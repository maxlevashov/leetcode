<?php

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function countPairs($n, $edges)
    {
        $adj = [];
        foreach ($edges as $edge) {
            $adj[$edge[0]][] = $edge[1];
            $adj[$edge[1]][] = $edge[0];
        }
        $numberOfPairs = 0;
        $sizeOfComponent = 0;
        $remainingNodes = $n;
        $visited = [];
        for ($i = 0; $i < $n; $i++) {
            if (!$visited[$i]) {
                $sizeOfComponent = $this->dfs($i, $adj, $visited);
                $numberOfPairs += $sizeOfComponent 
                    * ($remainingNodes - $sizeOfComponent);
                $remainingNodes -= $sizeOfComponent;
            }
        }

        return $numberOfPairs;
    }

    protected function dfs($node, &$adj, &$visited)
    {
        $visitedVertices = 1;
        $visited[$node] = true;
        foreach ($adj[$node] as $neighbor)
            if (!$visited[$neighbor]) {
                $visitedVertices += $this->dfs($neighbor, $adj, $visited);
            }

        return $visitedVertices;
    }

}
