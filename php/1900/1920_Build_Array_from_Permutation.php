<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function buildArray($nums)
    {
        $result = [];

        foreach ($nums as $key => $num) {
            $result[] = $nums[$nums[$key]];
        }

        return $result;
    }

}
