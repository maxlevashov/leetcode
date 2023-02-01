<?php

class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        $countStrs = count($strs);
        if ($countStrs == 0) {
            return '';
        }
        $prefix = $strs[0];
        
        for ($i = 1; $i < $countStrs; $i++) {
            while (strpos($strs[$i], $prefix) !== 0) {
                $prefix = substr($prefix, 0, strlen($prefix) - 1);
                if (empty($prefix)) {
                    return '';
                }
            }
        }

        return $prefix;
    }
}

