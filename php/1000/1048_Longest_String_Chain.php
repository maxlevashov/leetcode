<?php

class Solution 
{

    /**
     * @param String[] $words
     * @return Integer
     */
    function longestStrChain($words) 
    {
        usort($words, fn($s1, $s2) =>
             strlen($s1) > strlen($s2)
        );
        $map = [];
        $result = 0;

        foreach ($words as $word) {
            $longest = 0;
            for ($i = 0; $i < strlen($word); $i++) {
                $sub = $word;
                $sub = substr_replace($sub, '', $i, 1);
                $longest = max($longest, $map[$sub] + 1);
            }
            $map[$word] = $longest;
            $result = max($result, $longest);
        }

        return $result ;
    }

}

