<?php

class Solution 
{

    /**
     * @param String[] $words
     * @return Boolean
     */
    function makeEqual($words) 
    {
        $counts = [];
        foreach ($words as $word) {
            for ($i = 0; $i < strlen($word); $i++) {
                $counts[$word[$i]]++;
            }
        }
        
        $n = count($words);
        foreach ($counts as $count) {
            if ($count % $n != 0) {
                return false;
            }
        }
        
        return true;
    }
}

