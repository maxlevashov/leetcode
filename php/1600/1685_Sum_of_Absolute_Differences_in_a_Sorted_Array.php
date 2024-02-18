<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function getSumAbsoluteDifferences($nums) 
    {
        $n = count($nums);
        $prefix = array_fill(0, $n, 0);
        $prefix[0] = $nums[0];
        for ($i = 1; $i < $n; $i++) {
            $prefix[$i] = $prefix[$i - 1] + $nums[$i];
        }
        
        $ans = array_fill(0, $n, 0);
        for ($i = 0; $i < $n; $i++) {
            $leftSum = $prefix[$i] - $nums[$i];
            $rightSum = $prefix[$n - 1] - $prefix[$i];
            
            $leftCount = $i;
            $rightCount = $n - 1 - $i;
            
            $leftTotal = $leftCount * $nums[$i] - $leftSum;
            $rightTotal = $rightSum - $rightCount * $nums[$i];
            
            $ans[$i] = $leftTotal + $rightTotal;
        }
        
        return $ans;
    }
}

