<?php

class Solution 
{

    /**
     * @param String $word1
     * @param String $word2
     * @return String
     */
    function mergeAlternately($word1, $word2) 
    {
        $result = '';
        $i = 0;
        $lenOne = strlen($word1);
        $lenTwo = strlen($word2);
        while ($i < $lenOne && $i < $lenTwo) {
            $result .= $word1[$i] . $word2[$i];
            $i++;
        }
        $result .= substr($word1, $i, $lenOne - $i) . substr($word2, $i, $lenTwo - $i);

        return $result;
    }
}

