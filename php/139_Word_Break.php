<?php

class Solution 
{

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) 
    {
        $n = strlen($s);
        $dp = array_fill(0, $n, 0);

        for ($i = -1; $i < $n; $i++) {
            if ($i >= 0 && $dp[$i] == false) {
                continue;
            }
            foreach ($wordDict as $word) {
                $j = 0;
                while (
                    $j < strlen($word)
                    && $i + 1 + $j < $n
                    && $word[$j] == $s[$i + 1 + $j]
                ) {
                    $j++;
                }
                if ($j == strlen($word)) {
                    $dp[$i + strlen($word)] = true;
                }
            }
        }

        return $dp[$n - 1];
    }
}

