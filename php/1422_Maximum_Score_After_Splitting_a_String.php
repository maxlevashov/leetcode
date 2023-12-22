<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function maxScore($s) 
    {
        $ones = 0;
        $zeros = 0;
        $best = PHP_INT_MIN;
        $len = strlen($s);

        for ($i = 0; $i < $len - 1; $i++) {
            if ($s[$i] == '1') {
                $ones++;
            } else {
                $zeros++;
            }
            
            $best = max($best, $zeros - $ones);
        }
        
        if ($s[$len - 1] == '1') {
            $ones++;
        }
        
        return $best + $ones;
    }
}

