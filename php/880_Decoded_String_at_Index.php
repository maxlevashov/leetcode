<?php

class Solution 
{

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function decodeAtIndex($s, $k) 
    {
        $len = 0;
        for ($i = 0; $len < $k; ++$i) {
            $len = is_numeric($s[$i]) ? $len * ($s[$i]) : $len + 1;
        }
        while ($i--) {
            if (is_numeric($s[$i])) {
                $len /= $s[$i];
                $k %= $len;
            } elseif ($k % $len-- == 0) {
                return $s[$i];
            }
        }
        return '';
    }
}
