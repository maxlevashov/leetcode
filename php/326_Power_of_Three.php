<?php

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfThree($n) {
        if ($n < 1) {
            return false;
        } else if ($n == 1) {
            return true;
        }
        
        return ($n / 3) == 3 
            ? true 
            : $this->isPowerOfThree($n / 3);
    }
}