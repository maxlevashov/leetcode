<?php

class Solution 
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function findTheDifference($s, $t) 
    {
        $s .= $t;
        $numberChar = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            $numberChar ^= ord($s[$i]);
        }

        return chr($numberChar);
    }
}

