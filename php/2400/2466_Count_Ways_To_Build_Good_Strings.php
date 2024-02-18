<?php

class Solution 
{

    /**
     * @param Integer $low
     * @param Integer $high
     * @param Integer $zero
     * @param Integer $one
     * @return Integer
     */
    function countGoodStrings($low, $high, $zero, $one) 
    {
        $memo = array_fill(0, $high + 1, 0);
        $memo[0] = 1;
        $mod = 1e9 + 7;

        for ($i = min($zero, $one); $i <= $high; $i++) {
            if ($i >= $zero) {
                $memo[$i] = ($memo[$i] + $memo[$i - $zero]) % $mod;
            }
            if ($i >= $one) {
                $memo[$i] = ($memo[$i] + $memo[$i - $one]) % $mod;
            }            
        }
        $sum = 0;
        for ($i = $low; $i <= $high; $i++) {
            $sum = ($sum + $memo[$i]) % $mod;
        }

        return $sum;
    }
}

