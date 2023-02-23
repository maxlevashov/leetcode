<?php

class Solution
{

    /**
     * @param Integer $k
     * @param Integer $w
     * @param Integer[] $profits
     * @param Integer[] $capital
     * @return Integer
     */
    function findMaximizedCapital($k, $w, $profits, $capital)
    {
        $profitsCount = count($profits);
        $projects = [];
        for ($i = 0; $i < $profitsCount; $i++) {
            $projects[] = [$capital[$i], $profits[$i]];
        }
        sort($projects);
        $queue = new \SplPriorityQueue();
        $ptr = 0;
        for ($i = 0; $i < $k; $i++) {
            while ($ptr < $profitsCount && $projects[$ptr][0] <= $w) {
                $queue->insert($projects[$ptr][1], $projects[$ptr][1]);
                $ptr++;
            }
            if ($queue->isEmpty()) {
                break;
            }
            $w += $queue->top();
            $queue->extract();
        }
        return $w;
    }

}
