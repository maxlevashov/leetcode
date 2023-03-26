<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxConsecutiveOnes($nums) {
        $maxCount = 0;
        $tempCount = 0;
        
        foreach ($nums as $num) {
            if ($num == 0) {
                $maxCount = max($maxCount, $tempCount);
                $tempCount = 0;
            } else {
                $tempCount++;
            }
        }
        $maxCount = max($maxCount, $tempCount);
        
        return $maxCount;
    }
}

