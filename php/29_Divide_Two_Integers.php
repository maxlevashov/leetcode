<?php

class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    function divide($dividend, $divisor) {
        define('MAX', 2147483647);
        define('MIN', -2147483648);
        // Check for overflow
        if ($divisor === 0 || ($dividend === MIN && $divisor === -1)) {
            return MAX;
        }   
        $isNegative = ($divisor < 0 || $dividend < 0)
            && !($divisor < 0 && $dividend < 0);
        $divisor = abs($divisor);
        $dividend = abs($dividend);
        $result = 0;
        
        while ($dividend >= $divisor) {
            $shift = 0;
            $shiftedDivisor = $Divisor;
            while ($dividend >= $shiftedDivisor) {
                $shift++;
                $shiftedDivisor = $divisor << $shift;
                if ($shiftedDivisor < 0) {
                    break;
                }
            }

            $result += (1 << ($shift - 1));
            $dividend -= $divisor << ($shift - 1);
    
        }
        $result = $isNegative ? 0 - $result : $result;
        
        return $result;
    }
}

