<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function sortByBits($arr) 
    {
        usort($arr, 'compare');

        return $arr;
    }

    public static function findWeight(int $num) 
    {
        $mask = 1;
        $weight = 0;
        
        while ($num > 0) {
            if (($num & $mask) > 0) {
                $weight++;
                $num ^= $mask;
            }
            
            $mask <<= 1;
        }
        
        return $weight;
    }
}

function compare(int $a, int $b) {
    if (Solution::findWeight($a) == Solution::findWeight($b)) {
        return $a - $b;
    }
    
    return Solution::findWeight($a) - Solution::findWeight($b);
}

