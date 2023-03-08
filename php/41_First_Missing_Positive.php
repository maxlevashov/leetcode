<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums)
    {
        $map = [];

        foreach ($nums as $num) {
            if ($num > 0) {
                $map[$num] = false;
            }
        }
        ksort($map);
        for ($i = 1; $i <= count($map) + 1; $i++) {
            if (!isset($map[$i])) {
                return $i;
            }
        }

        return 0;
    }

}
