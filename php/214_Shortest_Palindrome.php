<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function shortestPalindrome($string) {
        $lenString = strlen($string);
        $reverseString = strrev($string);
        $stringNew = $string . "#" . $reverseString;
        $lenStringNew = strlen($stringNew);
        $find = array_fill(0, $lenStringNew, 0);

        for ($i = 1; $i < $lenStringNew; $i++) {
            $prev = $find[$i - 1];
            while (
                $prev > 0 
                && $stringNew[$i] != $stringNew[$prev]
            ) {
                $prev = $find[$prev - 1];
            }
            if ($stringNew[$i] == $stringNew[$prev]) {
                ++$prev;
            }
            $find[$i] = $prev;
        }

        return substr($reverseString, 0, $lenString - $find[$lenStringNew - 1]) . $string;
    }
}

