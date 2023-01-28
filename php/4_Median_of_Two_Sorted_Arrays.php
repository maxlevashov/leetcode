<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {

        $merge = [];
        foreach ($nums1 as $num) {
            $merge[] = $num;
        }
        foreach ($nums2 as $num) {
            $merge[] = $num;
        }
        sort($merge);
        $mergeCount = count($merge);

        return $mergeCount % 2
                ? $merge[$mergeCount / 2] 
                : ($merge[$mergeCount / 2 - 1] + $merge[$mergeCount / 2]) / 2;
    }

}
