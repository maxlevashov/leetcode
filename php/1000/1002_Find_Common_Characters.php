<?php

class Solution
{

    const NUMBER_LETTERS_ALPHABET = 26;

    /**
     * @param String[] $words
     * @return String[]
     */
    function commonChars($words)
    {
        $arCommonChars = [];
        $arMinFrequencies = array_fill(0, self::NUMBER_LETTERS_ALPHABET, PHP_INT_MAX);
        foreach ($words as $word) {
            $arCharFrequencies = array_fill(0, self::NUMBER_LETTERS_ALPHABET, 0);
            for ($i = 0; $i < strlen($word); $i++) {
                $arCharFrequencies[ord($word[$i]) - ord('a')]++;
            }

            for ($i = 0; $i < self::NUMBER_LETTERS_ALPHABET; $i++) {
                $arMinFrequencies[$i] = min($arMinFrequencies[$i], $arCharFrequencies[$i]);
            }
        }
       
        for ($i = 0; $i < self::NUMBER_LETTERS_ALPHABET; $i++) {
            while ($arMinFrequencies[$i] > 0) {
                $arCommonChars[] = chr($i + ord('a'));
                $arMinFrequencies[$i]--;
            }
        }
        
        return $arCommonChars;
    }

}
