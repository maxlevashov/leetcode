<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $arNumsSwap = [];
        $arResult = [];
        foreach ($nums as $key => $num) {
            if (isset($arNumsSwap[$target - $num])) {
                $arResult = [$arNumsSwap[$target - $num], $key];
            } else {
                $arNumsSwap[$num] = $key;
            }
        }

        return $arResult;
    }

}
