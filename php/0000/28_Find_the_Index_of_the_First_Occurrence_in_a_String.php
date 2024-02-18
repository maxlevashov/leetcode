<?php

class Solution
{

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle)
    {

        //$return  = strpos($haystack, $needle);
        //return $return !== false ? $return : -1;

        $m = strlen($needle);
        $n = strlen($haystack);

        for ($windowStart = 0; $windowStart <= $n - $m; $windowStart++) {
            for ($i = 0; $i < $m; $i++) {
                if ($needle[$i] != $haystack[$windowStart + $i]) {
                    break;
                }
                if ($i == $m - 1) {
                    return $windowStart;
                }
            }
        }

        return -1;
    }

}
