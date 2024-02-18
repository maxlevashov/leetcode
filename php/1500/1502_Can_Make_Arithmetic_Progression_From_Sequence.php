<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function canMakeArithmeticProgression($arr) 
    {
        sort($arr);  
        $diff = $arr[1] - $arr[0];
       
        for ($i = 2; $i < count($arr); $i++) {
            if ($arr[$i] - $arr[$i - 1] != $diff) {
                return false;
            }
        }

        return True;
    }
}

