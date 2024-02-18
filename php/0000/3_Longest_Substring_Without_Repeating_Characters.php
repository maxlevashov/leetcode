<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $stringLength = strlen($s);
        $result = 0;
        $index = [];
        for ($j = 0, $i = 0; $j < $stringLength; $j++) {
            $i = max($index[$s[$j]], $i);
            $result = max($result, $j - $i + 1);
            $index[$s[$j]] = $j + 1;
        }
        
        return $result;
    }
}

