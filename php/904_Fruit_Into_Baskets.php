<?php

class Solution
{

    /**
     * @param Integer[] $fruits
     * @return Integer
     */
    function totalFruit($fruits)
    {

        $basket = [];
        $left = 0;
        $right = 0;

        for (; $right < count($fruits); ++$right) {
            $basket[$fruits[$right]]++;
            if (count($basket) > 2) {
                $basket[$fruits[$left]]--;
                if ($basket[$fruits[$left]] == 0) {
                    unset($basket[$fruits[$left]]);
                }
                $left++;
            }
        }

        return $right - $left;
    }
}
