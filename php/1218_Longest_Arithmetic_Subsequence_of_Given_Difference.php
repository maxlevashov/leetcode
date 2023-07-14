<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @param Integer $difference
     * @return Integer
     */
    function longestSubsequence($arr, $difference) 
    {
        $memo = [];
        $result = 1;

        foreach ($arr as $item) {
            $prev = $memo[$item - $difference] ?? 0;
            $memo[$item] = $prev + 1;
            $result = max($result, $memo[$item]);
        }

        return $result;
    }
}

