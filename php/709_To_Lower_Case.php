<?php

class Solution
{

    const COUNT_CHAR = 32;

    /**
     * @param String $s
     * @return String
     */
    function toLowerCase($s)
    {
        // short, but slow - return strtolower($s);
        $result = '';
        for ($i = 0; $i < strlen($s); $i++) {
            if (ctype_upper($s[$i])) {
                $result .= chr(ord($s[$i]) + self::COUNT_CHAR);
            } else {
                $result .= $s[$i];
            }
        }

        return $result;
    }

}
