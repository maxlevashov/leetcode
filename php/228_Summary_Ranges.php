<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return String[]
     */
    function summaryRanges($nums) 
    {
        $result = [];
        $n = count($nums);
        if ($n == 0) {
            return $result;
        }     
        $a = $nums[0];
        
        for ($i = 0; $i < $n; $i++) {
            if ($i == $n - 1 || $nums[$i] + 1 != $nums[$i + 1]) {
                if ($nums[$i] != $a) {
                    $result[] = $a . '->' . $nums[$i];
                } else {
                    $result[] = strval($a);		
                }
                if ($i != $n - 1) {
                    $a = $nums[$i + 1];
                }
            }
        }

        return $result;
    }
}

