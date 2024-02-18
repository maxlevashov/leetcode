<?php

class Solution 
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function maxDotProduct($nums1, $nums2) 
    {
        $firstMax = $secondMax = PHP_INT_MIN;
        $firstMin = $secondMin = PHP_INT_MAX;
        foreach ($nums1 as $num) {
            $firstMax = max($firstMax, $num);
            $firstMin = min($firstMin, $num);
        }
        foreach ($nums2 as $num) {
            $secondMax = max($secondMax, $num);
            $secondMin = min($secondMin, $num);
        }
        if ($firstMax < 0 && $secondMin > 0) {
            return $firstMax * $secondMin;
        }
        if ($firstMin > 0 && $secondMax < 0) {
            return $firstMin * $secondMax;
        } 
        $count1 = count($nums1);
        $count2 = count($nums2);
        $dp = array_fill(0, $count1 + 1, array_fill(0, $count2 + 1, 0));

        for ($i = $count1 - 1; $i >= 0; $i--) {
            for ($j = $count2 - 1; $j >= 0; $j--) {
                $use = $nums1[$i] * $nums2[$j] + $dp[$i + 1][$j + 1];
                $dp[$i][$j] = max($use, max($dp[$i + 1][$j], $dp[$i][$j + 1]));
            }
        }
        
        return $dp[0][0];
    }
}

