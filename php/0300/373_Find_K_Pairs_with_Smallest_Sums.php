<?php

class Solution 
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer[][]
     */
    function kSmallestPairs($nums1, $nums2, $k) 
    {
        $pq = new SplPriorityQueue();
        $n = count($nums1);
        $m = count($nums2);

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                $sum = $nums1[$i] + $nums2[$j];
                if ($pq->count() < $k) {
                    $pq->insert([$sum, [$nums1[$i], $nums2[$j]]], $sum);
                } elseif($sum < $pq->current()[0]) {
                    $pq->extract();
                    $pq->insert([$sum, [$nums1[$i], $nums2[$j]]], $sum);
                } else {
                    break; 
                }
            }
        }

        $ans = [];
        while (!$pq->isEmpty()) {
            $ans[] = [$pq->current()[1][0], $pq->current()[1][1]];
            $pq->extract();
        }
        
        return $ans;
    }
}

