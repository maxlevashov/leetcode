<?php

class Solution
{

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones)
    {
        $queue = new SplPriorityQueue();
        
        foreach ($stones as  $stone) {
            $queue->insert($stone, $stone);
        }
        while ($queue->count() > 1) {
            $a = $queue->extract(); 
            $b = $queue->extract();
            if ($a != $b) {
                $subtraction = abs($a - $b);
                $queue->insert($subtraction, $subtraction);
            }
        }
        
        return $queue->isEmpty() ? 0 : $queue->top();
    }
}
