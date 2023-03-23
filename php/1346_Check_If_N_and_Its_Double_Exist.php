<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function checkIfExist($arr) 
    {
        $set = [];
        
        foreach ($arr as $num) {
            if (
                isset($set[$num * 2]) 
                || ($num % 2 == 0 && isset($set[$num / 2]))
            ) {
                return true;
            }

            $set[$num] = false;;
        }

        return false;
    }
}

