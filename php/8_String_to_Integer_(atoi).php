<?php

class Solution
{

    protected const INT_MAX = 2147483647;
    protected const INT_MIN = -2147483648;

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s)
    {
        $counter = 0;
        $sign = 1;
        $result = 0;

        while ($s[$counter] === ' ') {
            $counter++;
        }

        if ($s[$counter] == '+' || $s[$counter] == '-') {
            $sign = $s[$counter] == '+' ? 1 : -1;
            $counter++;
        }

        while ($s[$counter] >= '0' && $s[$counter] <= '9') {
            $result = ($result * 10) + ($s[$counter] - 0);
            if ($sign == 1 && $result > self::INT_MAX) {
                return self::INT_MAX;
            }
            if ($sign == -1 && $result > self::INT_MAX + 1) {
                return self::INT_MIN;
            }
            $counter++;
        }

        return $result * $sign;
    }

}
