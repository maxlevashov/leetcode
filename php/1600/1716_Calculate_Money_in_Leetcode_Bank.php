<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function totalMoney($n) 
    {
        $result = 0;
        $monday = 1;
        
        while ($n > 0) {
            for ($day = 0; $day < min($n, 7); $day++) {
                $result += $monday + $day;
            }
            
            $n -= 7;
            $monday++;
        }
        
        return $result;
    }
}

