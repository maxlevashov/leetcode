<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function runningSum($nums) {
        $arResult = [];
        $sum = 0;
        
        foreach ($nums as $num) {
            $sum += $num;
            $arResult[] = $sum;
        }
        
        return $arResult;
    }
}

