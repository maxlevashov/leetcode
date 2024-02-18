<?php

class Solution 
{

    /**
     * @param Integer[][] $graph
     * @return Boolean
     */
    function isBipartite($graph) 
    {
        $n = count($graph);
        $colour = array_fill(0, $n, 0);

        for ($node = 0; $node < $n; $node++) {
            if ($colour[$node] != 0) {
                continue;
            }

            $queue = new SplQueue();
            $queue->enqueue($node);
            $colour[$node] = 1;

            while (!$queue->isEmpty()) {
                $current = $queue->dequeue();

                foreach ($graph[$current] as $neighbor) {
                    if ($colour[$neighbor] == 0) {
                        $colour[$neighbor] = -$colour[$current];
                        $queue->enqueue($neighbor);
                    } elseif ($colour[$neighbor] != -$colour[$current]) {
                        return false;
                    }
                }
            }
        }

        return true;
    }
}

