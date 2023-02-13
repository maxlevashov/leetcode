<?php

class Solution
{

    /**
     * @param Integer $low
     * @param Integer $high
     * @return Integer
     */
    function countOdds($low, $high)
    {
        if ($low > $high) {
            return 0;
        }

        $countOdd = intval(($high - $low) / 2);
        if ($low % 2 != 0 || $high % 2 != 0) {
            $countOdd++;
        }

        return $countOdd;
    }

}
