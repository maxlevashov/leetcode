<?php

class Solution
{

    /**
     * @param Integer[] $num
     * @param Integer $k
     * @return Integer[]
     */
    function addToArrayForm($num, $k)
    {
        $numCount = count($num);
        $cur = $k;
        $result = [];

        $i = $numCount;
        while (--$i >= 0 || $cur > 0) {
            if ($i >= 0) {
                $cur += $num[$i];
            }
            $result[] = $cur % 10;
            $cur = intval($cur / 10);
        }

        return array_reverse($result);
    }

}
