<?php

class Solution 
{

    /**
     * @param String[] $words
     * @param String $target
     * @return Integer
     */
    function numWays($words, $target) 
    {
        $wordLen = strlen($words[0]);
        $targetLen = strlen($target);
        $mod = pow(10, 9) + 7;
        $dp = array_fill(0, $targetLen + 1, 0);
        $dp[0] = 1;        
        $count = array_fill(0, 26, array_fill(0, $wordLen, 0));
        
        for ($i = 0; $i < $wordLen; $i++) {
            foreach ($words as $word) {
                $count[$i][ord($word[$i]) - ord('a')] += 1;
            }
        }
        for ($i = 0; $i < $wordLen; $i++) {
            for ($j = $targetLen - 1; $j > -1; $j--) {
                $dp[$j + 1] += $dp[$j] * $count[$i][ord($target[$j]) - ord('a')];
                $dp[$j + 1] %= $mod;
            }
        }

        return $dp[$targetLen];
    }
}
