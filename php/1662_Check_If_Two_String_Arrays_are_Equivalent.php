<?php

class Solution 
{

    /**
     * @param String[] $word1
     * @param String[] $word2
     * @return Boolean
     */
    function arrayStringsAreEqual($word1, $word2) 
    {
        $wordResult1 = '';
        $wordResult2 = '';
        foreach ($word1 as $subWord) {
            $wordResult1 .= $subWord;
        }
        foreach ($word2 as $subWord) {
            $wordResult2 .= $subWord;
        }

        return $wordResult1 == $wordResult2;
    }
}

