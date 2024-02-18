<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function reverseOnlyLetters($s)
    {
        
//        single pass version
//        
//        $result = '';
//        $stringLength = strlen($s);
//        $j = $stringLength - 1;
//
//        for ($i = 0; $i < $stringLength; $i++) {
//            if (ctype_alpha($s[$i])) {
//                while (!ctype_alpha($s[$j])) {
//                    $j--;
//                }
//                $result .= $s[$j];
//                $j--;
//            } else {
//                $result .= $s[$i];
//            }
//        }
        
        
        $result = '';
        $stringLength = strlen($s);
        $stack = [];

        for ($i = 0; $i < $stringLength; $i++) {
            if (ctype_alpha($s[$i])) {
                $stack[] = $s[$i];
            }
        }
        for ($i = 0; $i < $stringLength; $i++) {
            $result .= ctype_alpha($s[$i])
                    ? array_pop($stack)
                    : $s[$i];
        }

        return $result;
    }

}
