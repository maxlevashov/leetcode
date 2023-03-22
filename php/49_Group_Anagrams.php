<?php

class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $result = [];

        foreach ($strs as $str) {
            $tempStr = $str;
            $this->sortString($tempStr);
            $result[$tempStr][] = $str;
        }

        return $result;
    }

    protected function sortString(&$string) {
        $stringParts = str_split($string);
        sort($stringParts);
        $string = implode($stringParts);
    }
}

