<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function rearrangeArray($nums) 
    {
        $n = count($nums);
        $result = array_fill(0, $n, 0);
        $posIndex = 0;
        $negIndex = 1;

        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] > 0) {
                $result[$posIndex] = $nums[$i];
                $posIndex += 2;
            } else {
                $result[$negIndex] = $nums[$i];
                $negIndex += 2;
            }
        }

        return $result;
    }
}

