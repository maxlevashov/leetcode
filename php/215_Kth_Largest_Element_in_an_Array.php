<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) 
    {
        $queue = new SplPriorityQueue();
        foreach ($nums as $num) {
            $queue->insert($num, $num);
        }
        $result = 0;
        while ($k--) {
            $result = $queue->extract();
        }

        return $result;
    }
}
