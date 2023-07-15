<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function integerBreak($n) 
    {
        if ($n <= 3) {
            return $n - 1;
        } elseif ($n % 3 == 0) {
            return pow(3, intval($n / 3));
        } elseif ($n % 3 == 1) {
            return 4 * pow(3, ($n - 4) / 3);
        } 

        return 2 * pow(3, intval($n / 3));  
    }
}

