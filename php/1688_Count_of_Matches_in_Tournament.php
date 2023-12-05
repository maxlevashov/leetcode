<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function numberOfMatches($n) 
    {
        $result = 0;
        while ($n > 1) {
            if ($n % 2 == 0) {
                $result += $n / 2;
                $n = $n / 2;
            } else {
                $result += ($n - 1) / 2;
                $n = ($n - 1) / 2 + 1;
            }
        }
        
        return $result;
    }
}

