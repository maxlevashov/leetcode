<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $maxSum = $nums[0];
        $currentSum = 0;
        foreach ($nums as $num) {
            $currentSum = max($currentSum + $num, $num);
            $maxSum = max($currentSum, $maxSum);
        }
        return $maxSum;
    }

}
