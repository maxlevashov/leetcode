<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function binaryGap($n) 
    {
        $indexOne = -1;
        $longestDistance = 0;
        for ($i = 0; $i < 32; ++$i) {
            if ((($n >> $i) & 1) == 1) { 
                if ($indexOne != -1) {
                    $longestDistance = max($longestDistance, $i - $indexOne); 
                }
                $indexOne = $i; 
            }
        }

        return $longestDistance;
    }
}

