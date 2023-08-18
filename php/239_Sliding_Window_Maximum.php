<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k) 
    {
        $dequeue = new SplQueue();
        $result = [];
        for ($i = 0; $i < $k; $i++) {
            while (!$dequeue->isEmpty() && $nums[$i] >= $nums[$dequeue->top()]) {
                $dequeue->pop();
            }
            $dequeue->push($i);
        }
        $result[] = $nums[$dequeue->bottom()];

        for ($i = $k; $i < count($nums); $i++) {
            if ($dequeue->bottom() == $i - $k) {
                $dequeue->shift();
            }
            while (!$dequeue->isEmpty() && $nums[$i] >= $nums[$dequeue->top()]) {
                $dequeue->pop();
            }

            $dequeue->push($i);
            $result[] = $nums[$dequeue->bottom()];
        }
        
        return $result;
    }
}

