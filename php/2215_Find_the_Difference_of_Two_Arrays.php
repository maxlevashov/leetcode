<?php

class Solution 
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[][]
     */
    function findDifference($nums1, $nums2) 
    {
        $map1 = [];
        $map2 = [];
        $result = [[], []];
        $nums1 = array_unique($nums1);
        $nums2 = array_unique($nums2);
 
        foreach ($nums1 as $num) {
            $map1[$num] = true;
        }
        foreach ($nums2 as $num) {
            $map2[$num] = true;
        }

        foreach ($nums1 as $num) {
            if (!isset($map2[$num])) {
                $result[0][] = $num;
            }
        }
        foreach ($nums2 as $num) {
            if (!isset($map1[$num])) {
                $result[1][] = $num;
            }
        }

        return $result;
    }
}

