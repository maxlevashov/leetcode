<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortedSquares($nums)
    {
        $arResult = [];
        $left = 0;
        $right = count($nums) - 1;
        while ($left <= $right) {
            if ($nums[$left] * $nums[$left] > $nums[$right] * $nums[$right]) {
                $arResult[] = $nums[$left] * $nums[$left];
                $left++;
            } else {
                $arResult[] = $nums[$right] * $nums[$right];
                $right--;
            }
        }

        return array_reverse($arResult);
    }

}
