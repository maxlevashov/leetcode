<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) 
    {
        $numsCount = count($nums);
        $k = $k % $numsCount; 
        if ($k < 0) { 
            $k += $numsCount;
        }

        $this->reverse($nums, 0, $numsCount - $k - 1);
        $this->reverse($nums, $numsCount - $k, $numsCount - 1);
        $this->reverse($nums, 0, $numsCount - 1);
    }

    protected function reverse(array &$nums, int $i, int $j) {
        $left = $i;
        $right = $j;
        
        while ($left < $right) {
            $this->swap($nums[$left], $nums[$right]);
            $left++;
            $right--;
        }
    }

    protected function swap(&$a, &$b) {
        list($a, $b) = [$b, $a];
    }
}

