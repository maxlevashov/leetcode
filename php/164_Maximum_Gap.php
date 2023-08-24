<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumGap($nums) 
    {
        $pq = new SplPriorityQueue();
        foreach ($nums as $num)   {
            $pq->insert($num, $num);
        } 
        $maxDiff = 0;

        while ($pq->count() > 1){
            $maxDiff = max($maxDiff, abs($pq->extract() - $pq->top()));
        }

        return $maxDiff;
    }
}

