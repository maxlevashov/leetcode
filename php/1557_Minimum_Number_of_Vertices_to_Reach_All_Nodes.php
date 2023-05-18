<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findSmallestSetOfVertices($n, $edges) 
    {
        $indegree = array_fill(0, $n, 0);
        foreach ($edges as $edge) {
            $indegree[$edge[1]]++;
        }

        $result = [];
        for ($i = 0; $i < $n; $i++) {
            if ($indegree[$i] == 0) {
                $result[] = $i;
            }
        }

        return $result;
    }
}

