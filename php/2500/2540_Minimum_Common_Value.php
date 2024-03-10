<?php

class Solution 
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function getCommon($nums1, $nums2) 
    {
        $map = [];
        foreach ($nums2 as $num) {
            $map[$num] = true;
        }

        foreach ($nums1 as $num) {
            if (isset($map[$num])) {
                return $num;
            }
        }

        return -1;
    }
}

