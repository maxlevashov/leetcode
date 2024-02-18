<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) 
    {
        $result = 0;
        $temp = 0;
        $mask = 0;

        foreach ($nums as $num) {
            $temp ^= $result & $num;
            $result ^= $num;
            $mask = ~($result & $temp);
            $temp &= $mask;
            $result &= $mask;
        }

        return $result;
    }
}

