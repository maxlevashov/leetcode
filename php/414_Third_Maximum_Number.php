<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function thirdMax($nums) 
    {
        $nums = array_unique($nums);
        if (count($nums) < 3) {
            return max($nums);
        }
        
        $priorityQueue = new SplPriorityQueue();
        foreach ($nums as $num) {
            $priorityQueue->insert($num, $num);
        }

        $k = 3;
        $result = 0;
        while($k > 0) {
            $result = $priorityQueue->extract();
            $k--;
        }
        
        return $result;
    }
}

