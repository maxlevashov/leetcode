<?php

class Solution {

    /**
     * @param Integer $num1
     * @param Integer $num2
     * @return Integer
     */
    function sum($num1, $num2) {
        //return $num1 + $num2;

        if ($num2 == 0) {
            return $num1;
        }
        
        return array_sum([$num1 ^ $num2, ($num1 & $num2) << 1]);
    }
}

