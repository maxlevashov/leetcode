<?php

class Solution 
{


    /**
     * @param Integer[] $stones
     * @return Boolean
     */
    function canCross($stones) 
    {
        $mark = [];
        $dp = array_fill(0, 2001, array_fill(0, 2001, 0));
        $countStone = count($stones);

        for ($i = 0; $i < $countStone; $i++) {
            $mark[$stones[$i]] = $i;
        }
        
        $dp[0][0] = 1;
        for ($index = 0; $index < $countStone; $index++) {
            for ($prevJump = 0; $prevJump <= $countStone; $prevJump++) {
                if ($dp[$index][$prevJump]) {
                    if ($mark[$stones[$index] + $prevJump]) {
                        $dp[$mark[$stones[$index] + $prevJump]][$prevJump] = 1;
                    }
                    if ($mark[$stones[$index] + $prevJump + 1]) {
                        $dp[$mark[$stones[$index] + $prevJump + 1]][$prevJump + 1] = 1;
                    }
                    if ($mark[$stones[$index] + $prevJump - 1]) {
                        $dp[$mark[$stones[$index] + $prevJump - 1]][$prevJump - 1] = 1;
                    }
                }
            }
        }
        
        for ($prevJump = 0; $prevJump <= $countStone; $prevJump++) {
            if ($dp[$countStone - 1][$prevJump]) {
                return true;
            }
        }
        return false;
    }
}

