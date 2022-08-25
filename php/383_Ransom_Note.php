<?php

class Solution {

    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine) {
        $arRansom = [];
        $arMagazine = [];
        
        for ($i = 0; $i < strlen($ransomNote); $i++) {
            $arRansom[$ransomNote[$i]]++;
        }
        for ($i = 0; $i < strlen($magazine); $i++) {
            $arMagazine[$magazine[$i]]++;
        }
        
        $return = true;
        foreach ($arRansom as $letter => $countInString) {
            
            if (
                !isset($arMagazine[$letter])
                || $arMagazine[$letter] < $countInString
            ) {
                $return = false;
                break;
            }
        }
        
        return $return;
    }
}

