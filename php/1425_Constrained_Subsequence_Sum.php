<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function constrainedSubsetSum($nums, $k) 
    {
        $heap = new SplPriorityQueue();
        $heap->insert([$nums[0], 0], $nums[0]);
        $result = $nums[0];
        
        for ($i = 1; $i < count($nums); $i++) {
            while ($i - $heap->top()[1] > $k) {
                $heap->extract();
            }

            $current = max(0, $heap->top()[0]) + $nums[$i];
            $result = max($result, $current);
            $heap->insert([$current, $i], $current);
        }
        
        return $result;
    }
}

