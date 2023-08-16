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
        $dq = new SplQueue();
        $result = [];
        for ($i = 0; $i < $k; $i++) {
            while (!$dq->isEmpty() && $nums[$i] >= $nums[$dq->top()]) {
                $dq->pop();
            }
            $dq->push($i);
        }
        $result[] = $nums[$dq->bottom()];

        for ($i = $k; $i < count($nums); $i++) {
            if ($dq->bottom() == $i - $k) {
                $dq->shift();
            }
            while (!$dq->isEmpty() && $nums[$i] >= $nums[$dq->top()]) {
                $dq->pop();
            }

            $dq->push($i);
            $result[] = $nums[$dq->bottom()];
        }
        
        return $result;
    }
}

