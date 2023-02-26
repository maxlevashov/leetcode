<?php

class Solution
{

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance($word1, $word2)
    {
        $wordFirstLen = strlen($word1);
        $wordTwoLen = strlen($word2);
        $dp = array_fill(
            0,
            $wordFirstLen + 1,
            array_fill(0, $wordTwoLen + 1, 0)
        );
        for ($i = 0; $i <= $wordFirstLen; $i++) {
            for ($j = 0; $j <= $wordTwoLen; $j++) {
                if ($i == 0) {
                    $dp[$i][$j] = $j;
                } else if ($j == 0) {
                    $dp[$i][$j] = $i;
                } else if ($word1[$i - 1] == $word2[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } else {
                    $dp[$i][$j] = 1 + min(
                        $dp[$i - 1][$j - 1],
                        min($dp[$i - 1][$j], $dp[$i][$j - 1])
                    );
                }
            }
        }

        return $dp[$wordFirstLen][$wordTwoLen];
    }
}
