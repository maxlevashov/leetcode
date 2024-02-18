<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function replaceElements($arr) 
    {
        $greatest = -1;
        
        for ($i = count($arr) - 1; $i >= 0; $i--) {
            $temp = $arr[$i];
            $arr[$i] = $greatest;
            $greatest = max($greatest, $temp);
        }
        
        return $arr;
    }
}

