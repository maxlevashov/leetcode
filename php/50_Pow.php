<?php

class Solution
{

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n)
    {
        if ($n == 0) {
            return 1;
        }
        if ($n < 0) {
            $n = abs($n);
            $x = 1 / $x;
        }
        if ($n % 2 == 0) {
            return $this->myPow($x * $x, $n / 2);
        } else {
            return $x * $this->myPow($x, $n - 1);
        }
    }

}
