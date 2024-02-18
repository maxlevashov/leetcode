<?php

class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height)
    {
        $heightCount = count($height);
        if ($heightCount <= 2) {
            return 0;
        }
        $maxLeft = $height[0];
        $maxRight = $height[$heightCount - 1];
        $left = 1;
        $right = $heightCount - 2;
        $result = 0;
        while ($left <= $right) {
            if ($maxLeft < $maxRight) {
                if ($height[$left] > $maxLeft) {
                    $maxLeft = $height[$left];
                } else {
                    $result += $maxLeft - $height[$left];
                }
                $left += 1;
            } else {
                if ($height[$right] > $maxRight) {
                    $maxRight = $height[$right];
                } else {
                    $result += $maxRight - $height[$right];
                }
                $right -= 1;
            }
        }
        return $result;
    }

}
