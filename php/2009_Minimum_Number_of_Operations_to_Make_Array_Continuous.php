<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations($nums) 
    {
        $n = count($nums);
        $result = $n;
        $newNums = array_unique($nums);
        sort($newNums);

        for ($i = 0; $i < count($newNums); $i++) {
            $left = $newNums[$i];
            $right = $left + $n - 1;
            $j = $this->binarySearch($newNums, $right);
            $count = $j - $i;
            $result = min($result, $n - $count);
        }
        
        return $result;
    }

    public function binarySearch($newNums, int $target) 
    {
        $left = 0;
        $right = count($newNums);
        
        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            if ($target < $newNums[$mid]) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }
        
        return $left;
    }
}

