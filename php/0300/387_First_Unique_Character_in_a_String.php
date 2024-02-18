<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) 
    {
        $count = [];
        $n = strlen($s);
        for ($i = $n - 1; $i >= 0; $i--) {
            $count[$s[$i]] = ($count[$s[$i]] || 0) + 1;
        }

        for ($i = 0; $i < $n; $i++) {
            if ($count[$s[$i]] == 1) {
                return $i;
            } 
        }

        return -1;
    }
}

