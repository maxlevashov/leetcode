<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function findMatrix($nums) 
    {
        $freq = array_fill(0, count($nums) + 1, 0);
        
        $result = [];
        foreach ($nums as $num) {
            if ($freq[$num] >= count($result)) {
                $result[] = [];
            }
            
            $result[$freq[$num]][] = $num;
            $freq[$num]++;
        }
        
        return $result;
    }
}

