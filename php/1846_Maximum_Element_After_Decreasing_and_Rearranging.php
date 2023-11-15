<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function maximumElementAfterDecrementingAndRearranging($arr) 
    {
        sort($arr);
        $result = 1;
        
        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i] >= $result + 1) {
                $result++;
            }
        }
        
        return $result;
    }
}

