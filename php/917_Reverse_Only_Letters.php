<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function reverseOnlyLetters($s)
    {
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
