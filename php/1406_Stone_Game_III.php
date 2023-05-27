<?php

class Solution 
{

    /**
     * @param Integer[] $stoneValue
     * @return String
     */
    function stoneGameIII($stoneValue)
    {
        $n = count($stoneValue); 
        $dp = array_fill(0, 3, 0); 

        for ($i = $n - 1; $i >= 0; $i--) {
            $takeOne = $stoneValue[$i] - $dp[($i + 1) % 3];

            $takeTwo = PHP_INT_MIN;
            if ($i + 1 < $n) {
                $takeTwo = $stoneValue[$i] + $stoneValue[$i + 1] - $dp[($i + 2) % 3];
            }
            $takeThree = PHP_INT_MIN;
            if ($i + 2 < $n) {
                $takeThree = $stoneValue[$i] + $stoneValue[$i + 1] + $stoneValue[$i + 2] - $dp[($i + 3) % 3];
            }

            $dp[$i % 3] = max($takeOne, $takeTwo, $takeThree);
        } 

        $value = $dp[0]; 
        if ($value > 0) {
            return "Alice";
        } elseif ($value  < 0) {
            return "Bob";
        } 
        
        return "Tie";        
    }
}

