<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function minCut($s) 
    {
        $stringLen = strlen($s);
        $cut = [];  

        for ($i = 0; $i <= $stringLen; $i++) {
            $cut[$i] = $i - 1;
        }
        for ($i = 0; $i < $stringLen; $i++) {
            for (
                $j = 0; 
                $i - $j >= 0 
                    && $i + $j < $stringLen 
                    && $s[$i - $j] == $s[$i + $j]; 
                $j++
            ) {
                $cut[$i + $j + 1] = min($cut[$i + $j + 1], 1 + $cut[$i - $j]);
            }

            for (
                $j = 1; 
                $i - $j + 1 >= 0 
                    && $i + $j < $stringLen 
                    && $s[$i - $j + 1] == $s[$i + $j]; 
                $j++
            ) {
                $cut[$i + $j + 1] = min($cut[$i + $j + 1], 1 + $cut[$i - $j + 1]);
            }
        }

        return $cut[$stringLen];
    }
}

