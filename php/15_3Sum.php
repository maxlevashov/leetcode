<?php

class Solution
{

    const TARGET = 0;

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        sort($nums);
        $set = [];
        $result = [];

        for ($left = 0; $left < count($nums); $left++) {
            $mid = $left + 1;
            $right = count($nums) - 1;
            while ($mid < $right) {
                $sum = $nums[$left] + $nums[$mid] + $nums[$right];
                if ($sum == self::TARGET) {
                    $set[$nums[$left] . $nums[$mid] . $nums[$right]] = [
                        $nums[$left],
                        $nums[$mid],
                        $nums[$right]
                    ];
                    $mid++;
                    $right--;
                } else if ($sum < self::TARGET) {
                    $mid++;
                } else {
                    $right--;
                }
            }
        }

        return $set;
    }

}
