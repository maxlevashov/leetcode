<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function deleteAndEarn($nums) 
    {
        $max = max($nums);
        $memo = array_fill(0, $max + 1, 0);
        
        foreach ($nums as $num) {
            $memo[$num] += $num;
        }
        
        for ($i = 2; $i <= $max; $i++) {
            $memo[$i] = max($memo[$i - 2] + $memo[$i], $memo[$i - 1]);
        }
        
        return $memo[$max];
    }

}

