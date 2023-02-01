<?php

class Solution
{

    /**
     * @param String $str1
     * @param String $str2
     * @return String
     */
    function gcdOfStrings($str1, $str2)
    {
        $len1 = strlen($str1);
        $len2 = strlen($str2);
        for ($i = min($len1, $len2); $i >= 1; $i--) {
            if ($this->valid($str1, $str2, $i)) {
                return substr($str1, 0, $i);
            }
        }

        return '';
    }

    protected function valid($str1, $str2, $k)
    {
        $len1 = strlen($str1);
        $len2 = strlen($str2);

        if ($len1 % $k > 0 || $len2 % $k > 0) {
            return false;
        } else {
            $base = substr($str1, 0, $k);
            return empty(str_replace($base, '', $str1)) 
                    && empty(str_replace($base, '', $str2));
        }
    }

}
