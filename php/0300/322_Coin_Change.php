<?php

class Solution 
{

    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange($coins, $amount) 
    {
        $amount++;   
        $memo[0] = 0;
 
        sort($coins);

        for ($i = 1; $i < $amount; $i++) {
            $memo[$i] = PHP_INT_MAX;
            foreach ($coins as $coin) {
                if ($i - $coin < 0) {
                    break;
                }
                if ($memo[$i - $coin] != PHP_INT_MAX) {
                    $memo[$i] = min($memo[$i], 1 + $memo[$i - $coin]);
                }
            }
        }

        return $memo[--$amount] == PHP_INT_MAX ? -1 : $memo[$amount];
    }
}

