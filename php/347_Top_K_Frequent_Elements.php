<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k) {
        $countNums = array_count_values($nums);
        $priorityQueue = new SplPriorityQueue();
        
        foreach ($countNums as $num => $count) {
            $priorityQueue->insert($num, $count);
        }
        while ($k--) {
            $result[] = $priorityQueue->top();
            $priorityQueue->extract();
        }
        
        return $result;
    }
}

