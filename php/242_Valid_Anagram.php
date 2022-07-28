<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        
        $arSymbolS = str_split($s);
        $arSymbolT = str_split($t);
        sort($arSymbolS);
        sort($arSymbolT);
        
        return implode($arSymbolS) == implode($arSymbolT);
    }
}