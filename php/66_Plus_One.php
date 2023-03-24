<?php

class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        
        for ($i = count($digits) - 1; $i >= 0; $i--) {
            if ($digits[$i] + 1 == 10) {
                $digits[$i] = 0;
                if ($i == 0) {
                    array_unshift($digits, 1);
                }
            } else {
                $digits[$i]++;
                break;
            }
        }

        return $digits;
    }
}

