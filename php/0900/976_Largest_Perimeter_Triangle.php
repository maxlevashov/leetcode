<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function largestPerimeter($nums) {
        sort($nums);
        foreach (range(count($nums) - 3, -1, -1) as $number) {
            if ($nums[$number] + $nums[$number + 1] > $nums[$number + 2]) {
                return $nums[$number]
                        + $nums[$number + 1]
                        + $nums[$number + 2];
            }
        }
        
        return 0;
    }
}

