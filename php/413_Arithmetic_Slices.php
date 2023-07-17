<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numberOfArithmeticSlices($nums) 
    {
        $countNums = count($nums);
        if ($countNums < 3) {
            return 0;
        }
        $dp = array_fill(0, $countNums, 0);
        $result = 0;
        
        for ($i = 2; $i < $countNums; $i++) {
            if ($nums[$i] - $nums[$i - 1] == $nums[$i - 1] - $nums[$i - 2]) {
                $dp[$i] = 1 + $dp[$i - 1];
                $result += $dp[$i];
            }
        }

        return $result;
    }
}

