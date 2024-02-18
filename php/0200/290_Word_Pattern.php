<?php

class Solution
{

    /**
     * @param String $pattern
     * @param String $s
     * @return Boolean
     */
    function wordPattern($pattern, $s)
    {
        $arWords = explode(' ', $s);
        $arStringPattern = [];
        $arPatternString = [];
        if (count($arWords) !== strlen($pattern)) {
            return false;
        }
        foreach ($arWords as $key => $word) {
            if (!isset($arStringPattern[$word])) {
                $arStringPattern[$word] = $pattern[$key];
            } else {
                if ($arStringPattern[$word] != $pattern[$key]) {
                    return false;
                }
            }
            if (!isset($arPatternString[$pattern[$key]])) {
                $arPatternString[$pattern[$key]] = $word;
            } else {
                if ($arPatternString[$pattern[$key]] != $word) {
                    return false;
                }
            }
        }

        return true;
    }

}
