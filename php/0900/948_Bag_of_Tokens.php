<?php

class Solution 
{

    /**
     * @param Integer[] $tokens
     * @param Integer $power
     * @return Integer
     */
    function bagOfTokensScore($tokens, $power) 
    {
        $low = 0;
        $high = count($tokens) - 1;
        $score = 0;
        sort($tokens);

        while ($low  <= $high) {
            if ($power >= $tokens[$low]) {
                $score += 1;
                $power -= $tokens[$low];
                $low += 1;
            } else if ($low < $high && $score > 0) {
                $score -= 1;
                $power += $tokens[$high];
                $high -= 1;
            } else {
                return $score;
            }
        }
        return $score;
    }
}

