<?php
class Solution {

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2) {
        $memo = [];
        $textFirstStrlen = strlen($text1) + 1;
        $textTwoStrlen = strlen($text2) + 1;

        // short write memo = array_fill(0, $textFirstStrlen, array_fill(0, $textTwoStrlen, 0));
        // this for multilanguage
        for ($i = 0; $i < $textFirstStrlen; $i++) {
            for ($j = 0; $j < $textTwoStrlen; $j++) {
                $memo[$i][$j] = 0;
            }
        }

        $maxLength = 0;
        for ($i = 1; $i < $textFirstStrlen; $i++) {
            for ($j = 1; $j < $textTwoStrlen; $j++) {
                if ($text1[$i - 1] == $text2[$j - 1]) {
                    $memo[$i][$j] = 1 + $memo[$i - 1][$j - 1];
                } else {
                    $memo[$i][$j] = max($memo[$i - 1][$j], $memo[$i][$j - 1]);
                }

                $maxLength = max($maxLength, $memo[$i][$j]);
            }
        }
        
        return $maxLength;
    }
}