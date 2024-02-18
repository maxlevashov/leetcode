<?php

class Solution
{

    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies)
    {
        $candiesMax = max($candies);
        $result = [];

        foreach ($candies as $candy) {
            $result[] = $candy + $extraCandies >= $candiesMax;
        }

        return $result;
    }

}
