<?php

class Solution 
{

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($str, $pattern) 
    {
        $stringIndex = 0;
        $patternIndex = 0;
        $match = 0;
        $starIndex = -1;
        $stringStrlen = strlen($str);
        $patternStrlen = strlen($pattern);  

        while ($stringIndex < $stringStrlen) {

            if (
                $patternIndex < $patternStrlen 
                && (
                    $pattern[$patternIndex] == '?' 
                    || $str[$stringIndex] == $pattern[$patternIndex]
                )
            ) {
                $stringIndex++;
                $patternIndex++;

            } elseif ($patternIndex < $patternStrlen && $pattern[$patternIndex] == '*') {
                $starIndex = $patternIndex;
                $match = $stringIndex;
                $patternIndex++;

            } elseif ($starIndex != -1) {
                $patternIndex = $starIndex + 1;
                $match++;
                $stringIndex = $match;
                
            } else {
                return false;
            }
        }
        
        while (
            $patternIndex < $patternStrlen 
            && $pattern[$patternIndex] == '*'
        ) {
            $patternIndex++;
        }
        
        return $patternIndex == $patternStrlen;
    }
}

