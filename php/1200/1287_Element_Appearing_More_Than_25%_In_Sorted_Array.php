<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function findSpecialInteger($arr) 
    {
        $counts = [];
        $target = count($arr) / 4;
        foreach ($arr as $num) {
            $counts[$num]++;
            if ($counts[$num] > $target) {
                return $num;
            }
        }

        return -1;
    }
}

