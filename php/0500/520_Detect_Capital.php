<?php

class Solution
{

    /**
     * @param String $word
     * @return Boolean
     */
    function detectCapitalUse($word)
    {
        return in_array(
            $word, [
                strtoupper($word),
                strtolower($word),
                ucfirst(strtolower($word)),
            ]
        );
    }
}