<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfFour($n) 
    {
        if ($n > 0 && ($n & ($n - 1)) == 0) {
            $zeroCount = 0;
            while ($n > 1) {
                $zeroCount++;
                $n >>= 1;
            }
            return $zeroCount % 2 == 0;
        }
        
        return false;
    }
    
}

