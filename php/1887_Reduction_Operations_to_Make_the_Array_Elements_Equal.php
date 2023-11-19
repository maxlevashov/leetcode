<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function reductionOperations($nums) 
    {
        sort($nums);
        $result = 0;
        $up = 0;
        
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] != $nums[$i - 1]) {
                $up++;
            }
            
            $result += $up;
        }
        
        return $result;
    }
}

