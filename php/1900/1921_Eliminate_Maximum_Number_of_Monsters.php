<?php

class Solution 
{

    /**
     * @param Integer[] $dist
     * @param Integer[] $speed
     * @return Integer
     */
    function eliminateMaximum($dist, $speed) 
    {
        $arrival = [];
        for ($i = 0; $i < count($dist); $i++) {
            $arrival[] = (float) $dist[$i] / $speed[$i];
        }
        
        sort($arrival);
        $result = 0;
        
        for ($i = 0; $i < count($arrival); $i++) {
            if ($arrival[$i] <= $i) {
                break;
            }
            
            $result++;
        }
        
        return $result;
    }
}

