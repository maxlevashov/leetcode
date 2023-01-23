<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArrayByParityII($nums)
    {
        $i = 0;
        $j = 1;
        $numsCount = count($nums);
        while ($i < $numsCount && $j < $numsCount) {
            while ($i < $numsCount && $nums[$i] % 2 == 0) {
                $i += 2;
            }

            while ($j < $numsCount && $nums[$j] % 2 == 1) {
                $j += 2;
            }

            if ($i < $numsCount && $j < $numsCount) {
                $temp = $nums[$i];
                $nums[$i] = $nums[$j];
                $nums[$j] = $temp;
            }
        }

        return $nums;
    }

}
