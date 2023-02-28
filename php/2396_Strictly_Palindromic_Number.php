<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isStrictlyPalindromic($n)
    {
        $result = true;

        for ($i = 2; $i < $n - 1; $i++) {
            $curBaseValue = base_convert($n, 10, $i);

            if ($curBaseValue != strrev($curBaseValue)) {
                return false;
            }
        }

        return $result;
    }

}
