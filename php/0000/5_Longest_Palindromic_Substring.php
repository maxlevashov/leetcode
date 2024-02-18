<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $start = 0;
        $end = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            $len1 = $this->expandAroundCenter($s, $i, $i);
            $len2 = $this->expandAroundCenter($s, $i, $i + 1);
            $len = max($len1, $len2);
            if ($len > $end - $start) {
                $start = $i - intval(($len - 1) / 2);
                $end = $i + intval($len / 2);
            }
        }

        return substr($s, $start, $end + 1 - $start);
    }

    protected function expandAroundCenter($s, $left, $right)
    {
        $leftIndex = $left;
        $rightIndex = $right;
        while (
            $leftIndex >= 0 
            && $rightIndex < strlen($s) 
            && $s[$leftIndex] == $s[$rightIndex]
        ) {
            $leftIndex--;
            $rightIndex++;
        }

        return $rightIndex - $leftIndex - 1;
    }

}
