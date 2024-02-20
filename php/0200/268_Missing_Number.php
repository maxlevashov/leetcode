<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums) 
    {
        $start = 0;

        while ($start < count($nums)) {
            $num = $nums[$start];
            if ($num < count($nums) && $num != $start) {
                list($nums[$start], $nums[$num]) = [$nums[$num], $nums[$start]];
            } else {
                $start += 1;
            }
        }
        foreach (range(0, count($nums)) as $i) {
            if ($nums[$i] != $i) {
                return $i;
            }
        }

        return count($nums);
    }
}

