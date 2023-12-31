<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function maxLengthBetweenEqualCharacters($s) 
    {
        $firstIndex = [];
        $result = -1;
        
        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($firstIndex[$s[$i]])) {
                $result = max($result, $i - $firstIndex[$s[$i]] - 1);
            } else {
                $firstIndex[$s[$i]] = $i;
            }
        }

        return $result;
    }
}

