<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function validPalindrome($s) {
        $left = 0;
        $right = strlen($s) - 1;

        while ($left <= $right) {
            if ($s[$left] != $s[$right]) {
                return $this->isPalindrome($s, $left +1, $right)
                    || $this->isPalindrome($s, $left, $right - 1);
            }
            $left++;
            $right--;
        }

        return true;
    }

    protected function isPalindrome($s, $l, $r) {
        $left = $l;
        $right = $r;

        while ($left  <= $right) {
            if ($s[$left] != $s[$right]) {
                return false;
            }
            $left++;
            $right--;
        }

        return true;
    }
}

