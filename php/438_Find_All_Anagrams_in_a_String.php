<?php

class Solution
{

    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    function findAnagrams($s, $p)
    {
        $sLen = strlen($s);
        $pLen = strlen($p);
        $return = [];

        if ($sLen < $pLen) {
            return $return;
        }

        $frequency = array_fill(0, 26, 0);
        $window = array_fill(0, 26, 0);

        for ($i = 0; $i < $pLen; $i++) {
            $frequency[ord($p[$i]) - ord('a')]++;
            $window[ord($s[$i]) - ord('a')]++;
        }

        if ($frequency == $window) {
            $return[] = 0;
        }

        for ($i = $pLen; $i < $sLen; $i++) {
            $window[ord($s[$i - $pLen]) - ord('a')]--;
            $window[ord($s[$i]) - ord('a')]++;

            if ($frequency == $window) {
                $return[] = $i - $pLen + 1;
            }
        }

        return $return;
    }

}
