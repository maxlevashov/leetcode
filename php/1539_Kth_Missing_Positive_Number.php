<?php

class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer
     */
    function findKthPositive($arr, $k)
    {
        foreach ($arr as $number) {
            if ($number <= $k) {
                $k++;
            } else {
                break;
            }
        }

        return $k;
    }

}
