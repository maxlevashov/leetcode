<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Float
     */
    function findMaxAverage($nums, $k)
    {
        $average = [];
        $sum = 0;
        $start = 0;
        $numsCount = count($nums);
        for ($end = 0; $end < $numsCount; $end++) {
            $sum += $nums[$end];

            if ($end >= $k - 1) {
                $average[] = $sum / $k;
                $sum -= $nums[$start];
                $start += 1;
            }
        }
        return max($average);
    }

}
