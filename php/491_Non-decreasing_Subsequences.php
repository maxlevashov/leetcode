<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function findSubsequences($nums)
    {
        $numsCount = count($nums);
        $arResult = [];
        for ($bitmask = 1; $bitmask < (1 << $numsCount); $bitmask++) {
            $sequence = [];
            for ($i = 0; $i < $numsCount; $i++) {
                if ((($bitmask >> $i) & 1) == 1) {
                    $sequence[] = $nums[$i];
                }
            }
            if (count($sequence) >= 2) {
                $isIncreasing = true;
                for ($i = 0; $i < count($sequence) - 1; $i++) {
                    $isIncreasing &= $sequence[$i] <= $sequence[$i + 1];
                }
                if ($isIncreasing) {
                    $arResult[md5(serialize($sequence))] = $sequence;
                }
            }
        }


        return $arResult;
    }

}
