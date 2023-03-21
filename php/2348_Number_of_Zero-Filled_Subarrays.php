<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function zeroFilledSubarray($nums)
    {
        $totalZeroSubarrays = $currentZeroSubarrays = 0;

        foreach ($nums as $num) {
            if ($num == 0) {
                $currentZeroSubarrays++;
                $totalZeroSubarrays += $currentZeroSubarrays;
            } else {
                $currentZeroSubarrays = 0;
            }
        }

        return $totalZeroSubarrays;
    }

}
