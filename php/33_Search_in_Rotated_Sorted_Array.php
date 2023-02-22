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
        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            if ($nums[$mid] == $target) {
                return $mid;
            }
            if ($nums[$left] <= $nums[$mid]) {
                if ($target >= $nums[$left] && $target < $nums[$mid]) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            } else {
                if ($target <= $nums[$right] && $target > $nums[$mid]) {
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }
        }

        return $nums[$left] == $target ? $left : -1;
    }

}
