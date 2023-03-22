<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) 
    {
        $countChar = 0;
        
        for ($i = strlen($s) - 1; $i >= 0; $i--) {
            if ($s[$i] != ' ') {
                $countChar++; 
            } elseif ($countChar > 0) {
                return $countChar;
            }
        }

        return $countChar;
    }
}

