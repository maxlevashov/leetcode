<?php

class Solution {

    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine) {
        $countChars = count_chars($magazine, 1);
        for ($i = 0; $i < strlen($ransomNote); ++$i) {
            if (empty($countChars[ord($ransomNote[$i])])) {
                return false;
            } 
           --$countChars[ord($ransomNote[$i])];
        }

        return true;
    }
}

