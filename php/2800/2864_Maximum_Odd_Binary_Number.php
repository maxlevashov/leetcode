<?php

class Solution 
{

    /**
     * @param String $s
     * @return String
     */
    function maximumOddBinaryNumber($s) 
    {
        $n = strlen($s); 

        $onesCnt = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] == '1') {
                $onesCnt++;
            }
        }

        $result = '';
        for ($i = 0; $i < $onesCnt - 1; $i++) {
            $result .= '1';
        }
        for ($i = 0; $i < $n - $onesCnt; $i++) {
            $result .= '0';
        }
        $result .= '1';

        return $result;

    }
}

