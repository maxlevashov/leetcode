<?php

class Solution 
{

    /**
     * @param Integer[] $spells
     * @param Integer[] $potions
     * @param Integer $success
     * @return Integer[]
     */
    function successfulPairs($spells, $potions, $success) 
    {
        $n = count($spells);
        $m = count($potions);
        $pairs = [];
        sort($potions);
        for ($i = 0; $i < $n; $i++) {
            $spell = $spells[$i];
            $left = 0;
            $right = $m - 1;
            while ($left <= $right) {
                $mid =  intval(($right + $left) / 2);
                $product = $spell * $potions[$mid];
                if ($product >= $success) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            }
            $pairs[$i] = $m - $left;
        }
        return $pairs;
    }

}

