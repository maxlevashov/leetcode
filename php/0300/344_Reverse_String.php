<?php

class Solution {

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s) {
        
        // method two pointers
        $left = 0;
        $right = count($s) - 1;
        $temp = '';

        while ($left < $right) {
          $temp = $s[$left];
          $s[$left] = $s[$right];
          $s[$right] = $temp;
          $left++;
          $right--;
        }
        
        return $s;
    }
}
