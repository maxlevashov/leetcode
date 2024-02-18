<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) 
    {
        $left = 0; 
        $right = count($nums) - 1;

        while ($left <= $right) {
            $mid = intval(($right + $left) / 2);
            if ($target == $nums[$mid]) {
                return $mid;
            } elseif ($nums[$mid] > $target) {
                $right = $mid - 1;
            } elseif ($nums[$mid] < $target) {
                $left = $mid + 1;
            }
        }

        return -1;
    }
}

