<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    function transpose($matrix) {
        $arResult = [];
        
        for ($i = 0; $i < count($matrix); $i++) {
            for ( $j = 0; $j < count($matrix[$i]); $j++) {
                $arResult[$j][$i] = $matrix[$i][$j];
            }
        }
        
        return $arResult;
    }
}

