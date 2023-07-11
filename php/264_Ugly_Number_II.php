<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n) 
    {
        $memo = array_fill(0, $n, 0);
        $memo[0] = 1;
        $pointer1 = 0;
        $pointer2 = 0;
        $pointer3 = 0;

        for ($i = 1; $i < $n; $i++) {
            $multipleOfTwo = $memo[$pointer1] * 2;
            $multipleOfThree = $memo[$pointer2] * 3;
            $multipleOfFive = $memo[$pointer3] * 5;

            $memo[$i] = min($multipleOfTwo, min($multipleOfThree, $multipleOfFive));

            if ($multipleOfTwo == $memo[$i]) {
                $pointer1++;
            }
            if ($multipleOfThree == $memo[$i]) {
                $pointer2++;
            }
            if ($multipleOfFive == $memo[$i]) {
                $pointer3++;
            }
        }

        return $memo[$n - 1];
    }
}

