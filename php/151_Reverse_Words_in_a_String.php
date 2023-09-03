<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        
//        $s = trim(preg_replace('/\s+/', ' ', $s));
//        $words = explode(' ', $s);
//        $words = array_reverse($words);
//        return implode(' ', $words);
        
        $result = '';
        $end = strlen($s) - 1;

        while ($end >= 0) {
            while ($end >= 0 && $s[$end] == ' ') {
                $end--;
            }
            if ($end < 0) {
                break;
            }
            if (!empty($result)) {
                $result .= " ";
            }
            $start = $end;
            while ($start >= 0 && $s[$start] != ' ') {
                $start--;
            }
            $result .= substr($s, $start + 1, $end - $start);
            $end = $start;
        }

        return $result;
    }
}

