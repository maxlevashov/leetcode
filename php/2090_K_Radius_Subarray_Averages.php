<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function getAverages($nums, $k) 
    {
        $n = count($nums);
        $windowSize = 2 * $k + 1;
        
        $windowSum = 0;
        $result = array_fill(0, $n, -1);

        if ($n < $windowSize) {
            return $result;
        }

        for ($i = 0; $i < $n; ++$i) {
            $windowSum += $nums[$i];

            if ($i - $windowSize >= 0) {
                $windowSum -= $nums[$i - $windowSize];
            }

            if ($i >= $windowSize - 1) {
                $result[$i - $k] = intval($windowSum / $windowSize); 
            }
        }

        return $result;
    }
}

