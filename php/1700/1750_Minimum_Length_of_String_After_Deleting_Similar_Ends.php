<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function minimumLength($s) 
    {
        $left = 0;
        $right = strlen($s) - 1;

        while ($left < $right && $s[$left] == $s[$right]) {
            $c = $s[$left];

            while ($left <= $right && $s[$left] == $c) {
                $left++;
            }

            while ($right > $left && $s[$right] == $c) {
                $right--;
            }
        }

        return $right - $left + 1;
    }
}

