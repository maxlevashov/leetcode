<?php

class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        $left = 0;
        $right = count($height) - 1;
        $maxArea = 0;
        while ($left < $right) {
            if ($height[$left] < $height[$right]) {
                $maxArea = max($maxArea, $height[$left] * ($right - $left));
                $left++;
            } else {
                $maxArea = max($maxArea, $height[$right] * ($right - $left));
                $right--;
            }
        }

        return $maxArea;
    }

}
