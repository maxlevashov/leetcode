<?php

class Solution 
{

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) 
    {
        if ($x == 0) {
            return 0;
        }
        
        $left = 1;
        $right = PHP_INT_MAX;
        while (true) {
            $mid = $left + intval(($right - $left) / 2);
            if ($mid > intval($x / $mid)) {
                $right = $mid - 1;
            } else {
                if ($mid + 1 > $x / ($mid + 1)) {
                     return $mid;
                }
                $left = $mid + 1;
            }
        }

        return 0;
    }
}

