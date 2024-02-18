<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function countHomogenous($s) 
    {
        $result = 0;
        $currStreak = 0;
        $mod = 1e9 + 7;
        
        for ($i = 0; $i < strlen($s); $i++) {
            if ($i == 0 || $s[$i] == $s[$i - 1]) {
                $currStreak++;
            } else {
                $currStreak = 1;
            }
            
            $result = ($result + $currStreak) % $mod;
        }
        
        return $result;
    }
}

