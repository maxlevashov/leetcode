<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer[]
     */
    function shuffle($nums, $n)
    {
        $return = [];
        $fast = $n;

        foreach ($nums as $key => $num) {
            if ($key >= $n) {
                break;
            }
            $return[] = $num;
            $return[] = $nums[$fast];
            $fast++;
        }

        return $return;
    }

}
