<?php

class Solution
{

    const INTEGER_MAX_VALUE = 2147483647;
    const INTEGER_MIN_VALUE = -2147483648;

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
        $out = 0;
        while ($x != 0) {
            $out = $out * 10 + $x % 10;
            $x = intval($x / 10);
        }
        if (
                $out > self::INTEGER_MAX_VALUE || $out < self::INTEGER_MIN_VALUE
        ) {
            return 0;
        }

        return (int) $out;
    }

}
