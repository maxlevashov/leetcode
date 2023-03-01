<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function subtractProductAndSum($n)
    {
        $sum = 0;
        $product = 1;
        for (; $n > 0; $n = intval($n / 10)) {
            $sum += $n % 10;
            $product *= $n % 10;
        }

        return $product - $sum;
    }

}
