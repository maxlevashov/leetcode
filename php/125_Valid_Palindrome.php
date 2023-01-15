<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s)
    {
        $fix = '';
        for ($i = 0; $i < strlen($s); $i++) {
            if (ctype_alpha($s[$i]) || ctype_digit($s[$i])) {
                $fix .= $s[$i];
            }
        }
        $fix = strtolower($fix);
        $left = 0;
        $right = strlen($fix) - 1;
        while ($left <= $right) {
            if ($fix[$left] != $fix[$right]) {
                return false;
            }
            $left++;
            $right--;
        }

        return true;
    }

}
