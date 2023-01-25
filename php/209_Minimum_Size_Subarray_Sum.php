<?php

class Solution
{

    /**
     * @param Integer $target
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($target, $nums)
    {
        $ans = PHP_INT_MAX;
        $left = 0;
        $sum = 0;
        foreach ($nums as $key => $num) {
            $sum += $num;
            while ($sum >= $target) {
                $ans = min($ans, $key + 1 - $left);
                $sum -= $nums[$left++];
            }
        }

        return $ans != PHP_INT_MAX ? $ans : 0;
    }

}
