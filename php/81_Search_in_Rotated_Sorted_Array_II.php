<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Boolean
     */
    function search($nums, $target) 
    {
        $left = 0;
        $right = count($nums) - 1;
        
        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($nums[$mid] == $target) {
                return true;
            }

            if (
                $nums[$left] == $nums[$mid] 
                && $nums[$right] == $nums[$mid]
            ) {
                $left++;
                $right--;
            } elseif ($nums[$left] <= $nums[$mid]) {
                if ($nums[$left] <= $target && $nums[$mid] > $target) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }    
            } else {
                if ($nums[$mid] < $target && $nums[$right] >= $target) {
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }
        }

        return false;
    }
}

