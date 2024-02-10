<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function largestDivisibleSubset($nums) 
    {
        $n = count($nums);
        $maxi = 1;
        $num = -1;
        $result = [];
        sort($nums);
        $dp = array_fill(0, $n, 1);
        for ($i = 1; $i < $n; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if (!($nums[$i] % $nums[$j]) && $dp[$i] < $dp[$j] + 1){
                    $dp[$i] = $dp[$j] + 1;
                    if ($maxi < $dp[$i]) {
                        $maxi = $dp[$i];
                    }
                }
            }
        }
        for ($i = $n-1; $i >= 0; $i--) {
            if ($maxi == $dp[$i] && ($num==-1 || !($num % $nums[$i]))) {
                $result[] = $nums[$i];
                $maxi--;
                $num = $nums[$i];
            }
        }
        return $result;
    }
}

