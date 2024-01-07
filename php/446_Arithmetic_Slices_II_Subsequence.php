<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numberOfArithmeticSlices($nums) {
        $n = count($nums);
        $dp = array_fill(0, $n, array_fill(0, $n, 0));
        $map = [];
        for ($i = 0; $i < $n; $i++) {
            $temp = $nums[$i];
            $map[$temp][] = $i;
        }

        $sum = 0;
        for ($i = 1; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                $diff = 2 * $nums[$i] - $nums[$j];
                if (isset($map[$diff])) {
                    foreach ($map[$diff] as $num) {
                        if ($num < $i) {
                            $dp[$i][$j] += $dp[$num][$i] + 1;
                        } else {
                            break;
                        }
                    }
                }
                $sum += $dp[$i][$j];
            }
        }
        return $sum;
    }
}

