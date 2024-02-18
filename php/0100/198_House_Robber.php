<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) 
    {
        $numsCount = count($nums);
        if ($numsCount == 0) {
            return 0;
        }
        $memo = array_fill(0, $numsCount + 1, 0);
        $memo[1] = $nums[0];
        for ($i = 1; $i < $numsCount; $i++) {
            $val = $nums[$i];
            $memo[$i + 1] = max($memo[$i], $memo[$i - 1] + $val);
        }

        return $memo[$numsCount]; 
    }
}

