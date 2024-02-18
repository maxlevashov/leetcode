<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations($nums) 
    {
        $counter = [];
        foreach ($nums as $num) {
            $counter[$num]++;
        }
        $result = 0;
        foreach ($counter as $num) {
            if ($num == 1) {
                return -1;
            }
            $result += ceil($num / 3);
        }

        return $result;
    }
}

