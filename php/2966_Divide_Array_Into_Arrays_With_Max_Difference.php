<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[][]
     */
    function divideArray($nums, $k) 
    {
        sort($nums);
        $result = [];

        for ($i = 0; $i < count($nums); $i += 3) {
            if ($nums[$i + 2] - $nums[$i] > $k) {
                return [];
            }
            $result[] = [$nums[$i], $nums[$i + 1], $nums[$i + 2]];
        }

        return $result;
    }
}

