<?php

class Solution 
{

    /**
     * @param Integer[][] $piles
     * @param Integer $k
     * @return Integer
     */
    function maxValueOfCoins($piles, $k) 
    {
        $numPiles = count($piles);   
        $dp = array_fill(
            0,
            $numPiles + 1, 
            array_fill(0, $k + 1, 0)
        );
        
        for ($i = 1; $i <= $numPiles; $i++) {
            for ($j = 1; $j <= $k; $j++) {
                $dp[$i][$j] = $dp[$i - 1][$j]; 
                $currPile = $piles[$i - 1];
                $coinSum = 0;
                for ($l = 0; $l < min(count($currPile), $j); $l++) {
                    $coinSum += $currPile[$l];
                    $dp[$i][$j] = max($dp[$i][$j], $coinSum + $dp[$i - 1][$j - $l - 1]); 
                }
            }
        }
        
        return $dp[$numPiles][$k];
    }
}

