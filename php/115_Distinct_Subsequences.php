<?php

class Solution 
{

    /**
     * @param String $s
     * @param String $t
     * @return Integer
     */
    function numDistinct($s, $t) 
    {
        $fisrtLen = strlen($s);
        $twoLen = strlen($t);
        $mem = array_fill(0, $twoLen + 1, 
            array_fill(0, $fisrtLen + 1, 0)
        );
    

        for ($j = 0; $j <= $fisrtLen; $j++) {
            $mem[0][$j] = 1;
        }
        
        for ($i = 0; $i < $twoLen; $i++) {
            for ($j = 0; $j < $fisrtLen; $j++) {
                if ($t[$i] == $s[$j]) {
                    $mem[$i + 1][$j + 1] = $mem[$i][$j] + $mem[$i + 1][$j];
                } else {
                    $mem[$i + 1][$j + 1] = $mem[$i + 1][$j];
                }
            }
        }
        
        return $mem[$twoLen][$fisrtLen];
    }
}

