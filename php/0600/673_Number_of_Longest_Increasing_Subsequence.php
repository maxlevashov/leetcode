<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findNumberOfLIS($nums) 
    {
        $n = count($nums);
        $length = array_fill(0, $n, 1);
        $count = array_fill(0, $n, 1);

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($nums[$j] < $nums[$i]) {
                    if ($length[$j] + 1 > $length[$i]) {
                        $length[$i] = $length[$j] + 1;
                        $count[$i] = 0;
                    }
                    if ($length[$j] + 1 == $length[$i]) {
                        $count[$i] += $count[$j];
                    }
                }
            }
        }

        $maxLength = max($length);
        $result = 0;

        for ($i = 0; $i < $n; $i++) {
            if ($length[$i] == $maxLength) {
                $result += $count[$i];
            }
        }

        return $result;
    }
}

