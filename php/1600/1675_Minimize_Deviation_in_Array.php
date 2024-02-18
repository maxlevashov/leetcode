<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumDeviation($nums)
    {
        $pq = new \SplPriorityQueue();
        $result = $min = PHP_INT_MAX;
        foreach ($nums as $num) {
            if ($num % 2 == 1) {
                $num *= 2;
            }
            $pq->insert($num, $num);
            $min = min($min, $num);
        }

        while (true) {
            $max = $pq->extract();
            $result = min($result, $max - $min);
            if ($max % 2 == 1) {
                break;
            }
            $max /= 2;
            $min = min($min, $max);
            $pq->insert($max, $max);
        }

        return $result;
    }

}
