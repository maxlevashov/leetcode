<?php

class Solution 
{

    /**
     * @param Integer[] $piles
     * @return Integer
     */
    function maxCoins($piles) 
    {
        sort($piles);
        $queue = new SplQueue();
        foreach ($piles as $num) {
            $queue->push($num);
        }
        
        $result = 0;
        while (!$queue->isEmpty()) {
            $queue->pop();
            $result += $queue->pop();
            $queue->shift();
        }
        
        return $result;
    }
}

