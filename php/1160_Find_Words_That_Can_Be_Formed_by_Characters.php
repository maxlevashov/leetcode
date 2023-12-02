<?php

class Solution 
{

    /**
     * @param String[] $words
     * @param String $chars
     * @return Integer
     */
    function countCharacters($words, $chars) 
    {
        $map = [];
        $result = 0;
        for ($i = 0; $i < strlen($chars); $i++) {
            $map[$chars[$i]]++;
        }

        foreach ($words as $word) {
            $count = [];
            for ($i = 0; $i < strlen($word); $i++) {
                $count[$word[$i]]++;
            }
            $isGood = true;
            foreach ($count as $char => $freq) {
                if ($map[$char] < $freq) {
                    $isGood = false;
                }
            }

            if ($isGood) {
                $result += strlen($word);
            }
        }

        return $result;
    }
}

