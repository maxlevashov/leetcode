<?php

class Solution 
{

    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function rangeBitwiseAnd($left, $right) 
    {
        $count = 0;
        while ($left != $right) {
            $left >>= 1;
            $right >>= 1;
            $count++;
        }
        return ($left << $count);
    }
}

