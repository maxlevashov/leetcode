<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNonDuplicate($nums) {
        $result = 0;

        // O(n)
        // foreach ($nums as $num) {
        //     $result ^= $num;
        // }

        // O(log n) binary search
        $left = 0;
        $right = intval(count($nums) / 2);
        $result = 0;

        while ($left <= $right) {
            $mid = intval(($left + $right) / 2);
            $index = $mid * 2;
            if (
                $index + 1 >= count($nums) 
                || $nums[$index] != $nums[$index + 1]
            ) {
                $right = $mid - 1;
                $result = $nums[$index];
            } else {
                $left = $mid + 1;
            }
        }

        return $result;
    }
}

