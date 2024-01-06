<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums)
    {
        // $n = count($nums);
        // $dp = array_fill(0, $n, 1);
        // for ($i = 1; $i < $n; $i++) {
        //     for ($j = 0; $j < $i; $j++) {
        //         if ($nums[$j] < $nums[$i]) {
        //             $dp[$i] = max($dp[$i], $dp[$j] + 1);
        //         }
        //     }
        // }
        // return max($dp);

        $tails = array_fill(0, count($nums), 0);
        $size = 0;
        foreach ($nums as $num) {
            $left = 0;
            $right = $size;
            while ($left != $right) {
                $mid = intval(($left + $right) / 2);
                if ($tails[$mid] < $num) {
                    $left = $mid + 1;
                } else {
                    $right = $mid;
                }
            }
            $tails[$left] = $num;
            if ($left == $size) {
                ++$size;
            }
        }
        return $size;
    }

}
