<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $minK
     * @param Integer $maxK
     * @return Integer
     */
    function countSubarrays($nums, $minK, $maxK)
    {
        $numsCount = count($nums);
        $leftBound = -1;
        $lastMin = -1;
        $lastMax = -1;
        $count = 0;

        for ($i = 0; $i < $numsCount; $i++) {
            if ($nums[$i] >= $minK && $nums[$i] <= $maxK) {
                $lastMin = $nums[$i] == $minK ? $i : $lastMin;
                $lastMax = $nums[$i] == $maxK ? $i : $lastMax;
                $count += max(0, min($lastMin, $lastMax) - $leftBound);
            } else {
                $leftBound = $i;
                $lastMin = -1;
                $lastMax = -1;
            }
        }

        return $count;
    }

}
