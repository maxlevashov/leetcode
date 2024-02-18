<?php

class Solution 
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function maxUncrossedLines($nums1, $nums2) 
    {
        $nums1Count = count($nums1);
        $nums2Count = count($nums2);
        $dp = array_fill(0, $nums2Count + 1, 0);

        for ($i = 1; $i <= $nums1Count; $i++) {
            $prev = 0;
            for ($j = 1; $j <= $nums2Count; $j++) {
                $curr = $dp[$j];
                if ($nums1[$i - 1] == $nums2[$j - 1]) {
                    $dp[$j] = $prev + 1;
                } else {
                    $dp[$j] = max($dp[$j - 1], $curr);
                }
                $prev = $curr;
            }
        }

        return $dp[$nums2Count];
    }
}

