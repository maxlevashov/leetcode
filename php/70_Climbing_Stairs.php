<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        $a = $b = 1;
        foreach (range(0, $n - 1) as $item) {
            list($a, $b) = [$b, $a + $b];
        }

        return $a;
    }

}
