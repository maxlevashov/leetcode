<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums)
    {
        $boundary = 0;

        for ($i = 0; $i <= $boundary; $i++) {
            $boundary = max($boundary, $i + $nums[$i]);
            if ($boundary >= count($nums) - 1) {
                return true;
            }
        } 
        
        return false;
    }
}
