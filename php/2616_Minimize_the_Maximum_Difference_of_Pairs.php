<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $p
     * @return Integer
     */
    function minimizeMax($nums, $p) 
    {
        sort($nums);
        $n = count($nums);
        $left = 0;
        $right = $nums[$n - 1] - $nums[0];

        while ($left < $right) {
            $mid = intval(($right + $left) / 2);

            if ($this->countValidPairs($nums, $mid) >= $p) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }

        return $left;
    }
    
    /**
     * 
     * @param type $nums
     * @param type $threshold
     * @return int
     */
    protected function countValidPairs($nums, $threshold): int 
    {
        $index = 0;
        $count = 0;

        while ($index < count($nums) - 1) {
            if ($nums[$index + 1] - $nums[$index] <= $threshold) {
                $count++;
                $index++;
            }
            $index++;
        }

        return $count;
    }
}

