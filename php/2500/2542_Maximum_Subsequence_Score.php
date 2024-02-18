<?php

class Solution 
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer
     */
    function maxScore($nums1, $nums2, $k) 
    {
        $countNums1 = count($nums1);
        $pairs = array_fill(0, $countNums1, [0, 0]);
        for ($i = 0; $i < $countNums1; $i++) {
            $pairs[$i][0] = $nums2[$i];
            $pairs[$i][1] = $nums1[$i];
        }
        usort($pairs, function($a, $b) {
            return $b[0] > $a[0] ;
        });
        $priorityQueue = new SplPriorityQueue();
        $result = 0;
        $totalSum = 0;

        foreach ($pairs as $pair) {
            $priorityQueue->insert($pair[1], -$pair[1]);
            $totalSum += $pair[1];
            if ($priorityQueue->count() > $k) {
                $totalSum -= $priorityQueue->extract();
            }
            if ($priorityQueue->count() === $k) {
                $result = max($result, $totalSum * $pair[0]);
            }
        }

        return $result;
    }
}

