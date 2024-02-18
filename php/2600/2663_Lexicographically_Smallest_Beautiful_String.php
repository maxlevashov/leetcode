<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function smallestBeautifulString($s, $k) {
        $valid = function($i, $s) {
            return (
                $i < 1 || $s[$i] != $s[$i - 1]
            ) 
            && 
            (
                $i < 2 || $s[$i] != $s[$i - 2]
            );
        };
        $lenString = strlen($s);

        for ($i = $lenString - 1; $i >= 0; --$i) {
            $s[$i] = chr(ord($s[$i]) + 1);
            while (!$valid($i, $s)) {
                $s[$i] = chr(ord($s[$i]) + 1);
            }
            if (ord($s[$i]) < ord('a') + $k) {
                for ($i = $i + 1; $i < $lenString; ++$i) {
                    for ($s[$i] = 'a'; !$valid($i, $s); ) {
                        $s[$i] = chr(ord($s[$i]) + 1);
                    }
                }
                
                return $s;            
            }
        }

        return '';
    }
}

