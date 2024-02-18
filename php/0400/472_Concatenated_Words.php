<?php

class Solution
{

    /**
     * @param String[] $words
     * @return String[]
     */
    function findAllConcatenatedWordsInADict($words)
    {
        $dictionary = array_flip($words);
        $return = [];

        foreach ($words as $word) {
            $wordLen = strlen($word);
            $dp = array_fill(0, $wordLen + 1, 0);
            $dp[0] = true;
            for ($i = 1; $i <= $wordLen; $i++) {
                for ($j = ($i === $wordLen ? 1 : 0); !$dp[$i] && $j < $i; $j++) {
                    $dp[$i] = $dp[$j] && isset($dictionary[substr($word, $j, $i - $j)]);
                }
            }
            if ($dp[$wordLen]) {
                $return[] = $word;
            }
        }

        return $return;
    }

}
