<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return NULL
     */
    function duplicateZeros(&$arr) {
        for ($i = 0; $i < count($arr) - 1; $i++) {
            if ($arr[$i] == 0) { 
                for ($j = count($arr) - 2; $j > $i; $j--) {
                    $arr[$j + 1] = $arr[$j];
                }
                $i++;
                $arr[$i] = 0;
            }
        }
    }
}

