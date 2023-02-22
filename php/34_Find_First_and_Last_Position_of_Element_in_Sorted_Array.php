<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        $start = -1;
        $end = -1;
        $isFind = false;

        foreach ($nums as $key => $num) {
            if ($num == $target) {
                if (!$isFind) {
                    $start = $key;
                    $end = $key;
                    $isFind = true;
                } else {
                    $end = $key;
                }
            }
        }

        return [$start, $end];
    }

}
