<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function uniqueOccurrences($arr) {
        $arCount = [];
        foreach ($arr as $item) {
            $arCount[$item]++;
        }
        
        return count(array_unique($arCount)) == count($arCount);
    }
}