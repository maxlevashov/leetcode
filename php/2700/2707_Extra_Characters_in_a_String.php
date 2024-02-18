<?php

class Solution 
{

    /**
     * @param String $s
     * @param String[] $dictionary
     * @return Integer
     */
    function minExtraChar($s, $dictionary) 
    {
        $len = strlen($s);
        $dictionarySet = array_flip($dictionary);
        $dp = array_fill(0, $len + 1, 0);

        for ($start = $len - 1; $start >= 0; $start--) {
            $dp[$start] = $dp[$start + 1] + 1;
            for ($end = $start; $end < $len; $end++) {
                $curr = substr($s, $start, $end - $start + 1);
                if (isset($dictionarySet[$curr])) {
                    $dp[$start] = min($dp[$start], $dp[$end + 1]);
                }
            }
        }

        return $dp[0];
    }
}

