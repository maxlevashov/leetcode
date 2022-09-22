<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        $arWords = explode(' ', $s);
    
        foreach ($arWords as $key => $word) {
            $arWords[$key] = strrev($word);
        }
        
        return implode(' ', $arWords);
    }
}
