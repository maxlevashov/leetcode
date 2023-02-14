<?php

class Solution
{

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b)
    {
        $a = strrev($a);
        $b = strrev($b);
        $result = '';
        $carry = 0;
        $counter = 0;
        while ($counter < strlen($a) || $counter < strlen($b)) {
            $first = isset($a[$counter]) ? $a[$counter] : 0;
            $two = isset($b[$counter]) ? $b[$counter] : 0;
            $sum = $carry + $first + $two;

            if ($sum == 1) {
                $carry = 0;
            } elseif ($sum == 2) {
                $carry = 1;
                $sum = 0;
            } elseif ($sum == 3) {
                $sum = 1;
                $carry = 1;
            }

            $result .= $sum;
            $counter++;
        }
        if ($carry != 0) {
            $result .= $carry;
        }

        return strrev($result);
    }

}
