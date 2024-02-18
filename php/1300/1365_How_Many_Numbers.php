<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function smallerNumbersThanCurrent($nums)
    {
        $numsCount = count($nums);
        $result = array_fill(0, $numsCount, 0);
        $numsClone = $nums;
        sort($numsClone);
        foreach ($nums as $key => $num) {
            foreach ($numsClone as $clone) {
                if ($num > $clone) {
                    $result[$key]++;
                } else {
                    break;
                }
            }
        }

        return $result;
    }

}
