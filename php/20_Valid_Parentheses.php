<?php

class Solution
{

    const MAP = [
        ')' => '(',
        '}' => '{',
        ']' => '[',
    ];

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $stack = [];

        for ($i = 0; $i < strlen($s); $i++) {
            $curChar = $s[$i];

            if (isset(self::MAP[$curChar])) {
                $topElement = empty($stack) ? '#' : array_pop($stack);

                if ($topElement != self::MAP[$curChar]) {
                    return false;
                }
            } else {
                $stack[] = $curChar;
            }
        }

        return empty($stack);
    }

}
