<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function countDigitOne($n) 
    {
        $result = 0;

        for ($i = 1; $i <= $n; $i *= 10) {
            $a = intval($n / $i);
            $b = $n % $i;
            $x = $a % 10;
            if ($x == 1) {
                $result += intval($a / 10) * $i + ($b + 1);
            } elseif ($x == 0) {
                $result += intval($a / 10) * $i;
            } else {
                $result += intval($a / 10 + 1) * $i;
            }
        }

        return $result;
    }
}

