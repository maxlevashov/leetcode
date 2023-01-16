<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target)
    {
        $countNums = count($nums);
        $result = $nums[0] + $nums[1] + $nums[$countNums - 1];
        sort($nums);

        for ($i = 0; $i < $countNums - 2; $i++) {
            $left = $i + 1;
            $right = $countNums - 1;
            while ($left < $right) {
                $currentSum = $nums[$i] + $nums[$left] + $nums[$right];
                if ($currentSum < $target) {
                    $left++;
                } else {
                    $right--;
                }
                if (abs($currentSum - $target) < abs($result - $target)) {
                    $result = $currentSum;
                }
            }
        }

        return $result;
    }

}
