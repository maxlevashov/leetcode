<?php

class Solution 
{

    /**
     * @param Integer $low
     * @param Integer $high
     * @return Integer[]
     */
    function sequentialDigits($low, $high) 
    {
        $seq = '123456789';
        $result = [];
        for ($i = 0; $i < strlen($seq); $i++) {
            $x = '';
            for ($j = $i; $j < strlen($seq); $j++) {
                $x .= $seq[$j];
                $num = (int) $x;
                if ($low <= $num && $num <= $high) {
                    $result[] = $num;
                }
            }
        }
        sort($result);
        return $result;
    }
}

