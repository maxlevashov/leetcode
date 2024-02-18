<?php

class Solution 
{

    /**
     * @param String $s
     * @param String $t
     * @return Integer
     */
    function minSteps($s, $t) 
    {
        $count = array_fill(0, 26, 0);
        for ($i = 0; $i < strlen($s); $i++) {
            $count[ord($t[$i]) - ord('a')]++;
            $count[ord($s[$i]) - ord('a')]--;
        }

        $result = 0;
        for ($i = 0; $i < 26; $i++) {
            $result += max(0, $count[$i]);
        }
        
        return $result;
    }
}

