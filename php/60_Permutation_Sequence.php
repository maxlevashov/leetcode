<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    function getPermutation($n, $k) 
    {
        $numbers = [];
        $result = '';
        $factorial = 1;

        for ($i = 1; $i <= $n; $i++) {
            $factorial *= $i;
            $numbers[] = $i;
        }
        for ($i = 0, $l = $k - 1; $i < $n; $i++) {
            $factorial = intval($factorial / ($n - $i));    
            $index = intval($l / $factorial);
            $result .= $numbers[$index];
            unset($numbers[$index]);
            $numbers = array_values($numbers);
            $l -= $index * $factorial;
        }

        return $result;
    }
}

