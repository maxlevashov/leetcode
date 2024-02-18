<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums)
    {
        $result = 0;
        $numsCount = count($nums);
        $curEnd = 0;
        $curFar = 0;
        foreach ($nums as $key => $num) {
            if ($key == $numsCount - 1) {
                break;
            }
            $curFar = max($curFar, $key + $num);
            if ($key == $curEnd) {
                $result++;
                $curEnd = $curFar;
            }
        }

        return $result;
    }

}
