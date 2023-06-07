<?php

class Solution 
{

    /**
     * @param Integer $a
     * @param Integer $b
     * @param Integer $c
     * @return Integer
     */
    function minFlips($a, $b, $c) 
    {
        $result = 0;

        while ($a != 0 | $b != 0 | $c != 0) {
            if (($c & 1) == 1) {
                if (($a & 1) == 0 && ($b & 1) == 0) {
                    $result++;
                }
            } else {
                $result += ($a & 1) + ($b & 1);
            }
            
            $a >>= 1;
            $b >>= 1;
            $c >>= 1;
        }
        
        return $result;
    }
}

