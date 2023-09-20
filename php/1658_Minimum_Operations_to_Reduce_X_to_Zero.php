<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $x
     * @return Integer
     */
    function minOperations($nums, $x) {
        $sum = 0;
        foreach ($nums as $num) {
            $sum += $num;
        }

        $maxLength = -1;
        $currSum = 0;
        for ($left = 0, $right = 0; $right < count($nums); $right++) {
            $currSum += $nums[$right];
            while ($left <= $right && $currSum > $sum - $x) {
                $currSum -= $nums[$left++];
            }
            if ($currSum == $sum - $x) {
                $maxLength = max($maxLength, $right - $left + 1);
            }
        }

        return $maxLength == -1 ? -1 : count($nums) - $maxLength;
    }
}

