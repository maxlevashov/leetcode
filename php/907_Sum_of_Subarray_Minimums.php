<?php

class Solution 
{

    const MOD = 1000000007;

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function sumSubarrayMins($arr) 
    {
        $stack = new SplStack();
        $sumOfMinimums = 0;
        $n = count($arr);

        for ($i = 0; $i <= count($arr); $i++) {
            while (
                !$stack->isEmpty() 
                && (
                    $i == $n 
                    || $arr[$stack->top()] >= $arr[$i]
                )
            ) {
                $mid = $stack->top();
                $stack->pop();
                $leftBoundary = $stack->isEmpty() ? -1 : $stack->top();
                $rightBoundary = $i;

                $count = ($mid - $leftBoundary) * ($rightBoundary - $mid) % self::MOD;

                $sumOfMinimums += ($count * $arr[$mid]) % self::MOD;
                $sumOfMinimums %= self::MOD;
            }
            $stack->push($i);
        }

        return $sumOfMinimums;
    }
}

