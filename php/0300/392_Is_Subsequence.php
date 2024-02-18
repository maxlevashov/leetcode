<?php

class Solution 
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t)
    {
        $n = strlen($s);
        $m = strlen($t);
        $result = 0; 

        for ($i = 0; $i < $m && $result < $n; $i++) {
            if ($s[$result] == $t[$i]) {
                $result++;
            }
        }

        return $result == $n;
    }
}

