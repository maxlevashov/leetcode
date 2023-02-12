<?php

class Solution
{

    protected $fuel = 0;

    protected function dfs($node, $parent, $adj, $seats)
    {
        $representatives = 1;
        if (!isset($adj[$node])) {
            return $representatives;
        }
        foreach ($adj[$node] as $child) {
            if ($child != $parent) {
                $representatives += $this->dfs($child, $node, $adj, $seats);
            }
        }
        if ($node != 0) {
            $this->fuel += ceil((double) $representatives / $seats);
        }

        return $representatives;
    }

    /**
     * @param Integer[][] $roads
     * @param Integer $seats
     * @return Integer
     */
    function minimumFuelCost($roads, $seats)
    {
        $adj = [];
        foreach ($roads as $road) {
            $adj[$road[0]][] = $road[1];
            $adj[$road[1]][] = $road[0];
        }
        $this->dfs(0, -1, $adj, $seats);

        return $this->fuel;
    }

}
