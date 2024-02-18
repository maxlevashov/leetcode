<?php

class Solution
{

    /**
     * @param String[] $words
     * @param String $order
     * @return Boolean
     */
    function isAlienSorted($words, $order)
    {
        $orderMap = [];
        for ($i = 0; $i < strlen($order); $i++) {
            $orderMap[ord($order[$i]) - ord('a')] = $i;
        }

        for ($i = 0; $i < count($words) - 1; $i++) {
            for ($j = 0; $j < strlen($words[$i]); $j++) {
                if ($j >= strlen($words[$i + 1])) {
                    return false;
                }
                if ($words[$i][$j] != $words[$i + 1][$j]) {
                    $currentWordChar = ord($words[$i][$j]) - ord('a');
                    $nextWordChar = ord($words[$i + 1][$j]) - ord('a');
                    if ($orderMap[$currentWordChar] > $orderMap[$nextWordChar]) {
                        return false;
                    } else {
                        break;
                    }
                }
            }
        }

        return true;
    }

}
