<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer
     */
    function minPatches($nums, $n) 
    {
        $miss = 1;
        $added = 0;
        $i = 0;

        while ($miss <= $n) {
            if ($i < count($nums) && $nums[$i] <= $miss) {
                $miss += $nums[$i++];
            } else {
                $miss += $miss;
                $added++;
            }
        }
        
        return $added;
    }
}

