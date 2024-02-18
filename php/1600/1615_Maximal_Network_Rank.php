<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[][] $roads
     * @return Integer
     */
    function maximalNetworkRank($n, $roads) 
    {
        $maxRank = 0;
        $adj = [];
        foreach ($roads as $road) {
            $adj[$road[0]][$road[1]] = true;
            $adj[$road[1]][$road[0]] = true;
        }

        for ($node1 = 0; $node1 < $n; ++$node1) {
            for ($node2 = $node1 + 1; $node2 < $n; ++$node2) {
                $val1 = isset($adj[$node1]) ? count($adj[$node1]) : 0;
                $val2 = isset($adj[$node2]) ? count($adj[$node2]) : 0;
                $currentRank = $val1 + $val2;
                if (isset($adj[$node1][$node2])) {
                    --$currentRank;
                }

                $maxRank = max($maxRank, $currentRank);
            }
        }
  
        return $maxRank;
    }
}

