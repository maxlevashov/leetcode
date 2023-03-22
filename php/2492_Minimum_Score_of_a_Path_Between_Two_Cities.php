<?php

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $roads
     * @return Integer
     */
    function minScore($n, $roads)
    {
        $graph = [];
        foreach ($roads as $road) {
            $graph[$road[0]][$road[1]] = $graph[$road[1]][$road[0]] = $road[2];
        }
        $minScore = PHP_INT_MAX;
        $visited = [];
        $queue = new SplQueue();
        $queue->enqueue(1);

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            foreach ($graph[$node] as $adj => $score) {
                if (!isset($visited[$adj])) {
                    $queue->enqueue($adj);
                    $visited[$adj] = false;
                }
                $minScore = min($minScore, $score);
            }
        }
        return $minScore;
    }

}
