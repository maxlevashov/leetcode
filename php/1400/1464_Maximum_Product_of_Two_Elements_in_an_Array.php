<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) 
    {
        $biggest = 0;
        $secondBiggest = 0;
        foreach ($nums as $num) {
            if ($num > $biggest ) {
                $secondBiggest = $biggest ;
                $biggest = $num;
            } else {
                $secondBiggest = max($secondBiggest, $num);
            }
        }
        
        return ($biggest  - 1) * ($secondBiggest - 1);
    }
}

