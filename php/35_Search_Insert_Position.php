<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target)
    {
        $left = 0;
        $right = count($nums);
        while ($left < $right) {
            $mid = intval(($right + $left) / 2);
            if ($nums[$mid] == $target) {
                return $mid;
            }
            if ($nums[$mid] > $target) {
                $right = $mid;
            } elseif ($nums[$mid] < $target) {
                $left = $mid + 1;
            }
        }
        
        return $nums[$mid] < $target ? $mid + 1 : $mid;
    }

}
