<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $arSubsets = [[]];
        
        foreach ($nums as $num) {
             foreach (range(0, count($arSubsets) - 1) as $i) {
                 $arSubsets[] = array_merge($arSubsets[$i], [$num]);
             }
        }
        
        return $arSubsets;
    }
}

