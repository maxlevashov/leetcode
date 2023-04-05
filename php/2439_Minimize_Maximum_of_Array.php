<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimizeArrayValue($nums)
    {
        $totalSum = 0;
        $result = 0;

        foreach (range(0, count($nums)) as $index) {
            $totalSum += $nums[$index];
            $result = max($result, intval(($totalSum + $index) / ($index + 1)));
        }

        return $result;
    }

}
