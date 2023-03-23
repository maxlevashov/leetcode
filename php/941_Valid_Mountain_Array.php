<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function validMountainArray($arr) 
    {
        if (count($arr) < 3) {
            return false;
        }
        $left = 0;
        $right = count($arr) - 1;
        while(
            $left + 1 < count($arr) - 1 
            && $arr[$left] < $arr[$left + 1]
        ) {
            $left++;
        }
        while (
            $right - 1 > 0 
            && $arr[$right] < $arr[$right - 1]
        ) {
            $right--;
        }
        
        return $left == $right;
    }
}

