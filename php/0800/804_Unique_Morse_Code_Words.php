<?php

class Solution {

    /**
     * @param String[] $words
     * @return Integer
     */
    function uniqueMorseRepresentations($words) {
        $arMorse = [".-","-...","-.-.","-..",".","..-.","--.","....","..",".---","-.-",".-..","--","-.","---",".--.","--.-",".-.","...","-","..-","...-",".--","-..-","-.--","--.."];
        $codes = [];
        foreach ($words as $word) {
            $temp = '';
            $strlenWord = strlen($word);
            for ($i = 0; $i < $strlenWord; $i++) {
                $temp .= $arMorse[ord($word[$i]) - ord('a')];
            }
            $codes[$temp] = false;
        }

        return count($codes);
    }
}

