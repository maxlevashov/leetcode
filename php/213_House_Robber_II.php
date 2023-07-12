<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) 
    {    
        $countNums = count($nums); 
        if ($countNums < 2) {
            return $countNums ? $nums[0] : 0;
        }
        
        return max(
            $this->robber($nums, 0, $countNums - 2), 
            $this->robber($nums, 1, $countNums - 1)
        );
    }

    /**
     * 
     * @param type $nums
     * @param int $left
     * @param int $right
     * @return type
     */
    protected function robber(&$nums, int $left, int $right) 
    {
        $prev = 0;
        $current = 0;
        for ($i = $left; $i <= $right; $i++) {
            $temp = max($prev + $nums[$i], $current);
            $prev = $current;
            $current = $temp;
        }

        return $current;
    }
}

