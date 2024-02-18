<?php

class Solution {

    /**
     * @param String[] $arr
     * @return Integer
     */
    function maxLength($arr) {
        $maxLength = 0;
        $this->backTrack($arr, '', 0, $maxLength);
        return $maxLength;
    }

    protected function backTrack(&$arr, string $current, int $start, int &$maxLength) {
        if ($maxLength < strlen($current))
            $maxLength = strlen($current);

        for ($i = $start; $i < count($arr); $i++) {
            if (!$this->isValid($current, $arr[$i])) {
                continue;
            }

            $this->backTrack($arr, $current . $arr[$i], $i + 1, $maxLength);
        }
    }

    protected function isValid(string &$currentString, string &$newString) {
        $charSet = [];

        for ($i = 0; $i < strlen($newString); $i++) {
            if (isset($charSet[$newString[$i]])) {
                return false; 
            }

            $charSet[$newString[$i]] = $newString[$i];

            if (str_contains($currentString, $newString[$i])) {
                return false;  
            }
        }

        return true;
    }
}

