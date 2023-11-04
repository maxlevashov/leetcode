<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[] $left
     * @param Integer[] $right
     * @return Integer
     */
    function getLastMoment($n, $left, $right) 
    {
        $result = 0;
        foreach ($left as $num) {
            $result = max($result, $num);
        }
        
        foreach ($right as $num) {
            $result = max($result, $n - $num);
        }
        
        return $result;
    }
}

