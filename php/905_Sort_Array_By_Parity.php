<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArrayByParity($nums)
    {
        $left = 0;
        $right = count($nums) - 1;
        while ($left < $right) {
            if ($nums[$left] % 2 > $nums[$right] % 2) {
                $temp = $nums[$left];
                $nums[$left] = $nums[$right];
                $nums[$right] = $temp;
            }
            if ($nums[$left] % 2 == 0) {
                $left++;
            }
            if ($nums[$right] % 2 == 1) {
                $right--;
            }
        }

        return $nums;
    }

}
