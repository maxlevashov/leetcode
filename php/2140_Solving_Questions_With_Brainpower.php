<?php

class Solution 
{

    /**
     * @param Integer[][] $questions
     * @return Integer
     */
    function mostPoints($questions) 
    {
        $questionsCount = count($questions);
        $dp = array_fill(0, $questionsCount + 1, 0);

        for ($i = $questionsCount - 1; $i >= 0; $i--) {
            $point = $questions[$i][0];
            $jump = $questions[$i][1];

            $nextQuestion = min($questionsCount, $i + $jump + 1);
            $dp[$i] = max($dp[$i + 1], $point + $dp[$nextQuestion]);
        }
        
        return $dp[0];
    }
}

