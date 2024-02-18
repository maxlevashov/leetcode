<?php

class Solution 
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isNumber($s) 
    {
        $s = trim($s);
    
        $pointSeen = false;
        $eSeen = false;
        $numberSeen = false;
        $numberAfterE = true;
        for ($i = 0; $i < strlen($s); $i++) {
            if ('0' <= $s[$i] && $s[$i] <= '9') {
                $numberSeen = true;
                $numberAfterE = true;
            } elseif ($s[$i] == '.') {
                if ($eSeen || $pointSeen) {
                    return false;
                }
                $pointSeen = true;
            } elseif (strtolower($s[$i]) == 'e') {
                if ($eSeen || !$numberSeen) {
                    return false;
                }
                $numberAfterE = false;
                $eSeen = true;
            } elseif ($s[$i] == '-' || $s[$i] == '+') {
                if ($i != 0 && $s[$i - 1] != 'e') {
                    return false;
                }
            } else {
                return false;
            }
        }
        
        return $numberSeen && $numberAfterE;
    }
}
