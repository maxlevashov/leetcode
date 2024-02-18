<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function find132pattern($nums) 
    {
        $size = count($nums);
        if (count($nums) < 3) {
            return false;
        }
        $stack = new SplStack();
        $minArray = array_fill(0, $size, 0);
        $minArray[0] = $nums[0];

        for ($i = 1; $i < $size; $i++) {
            $minArray[$i] = min($minArray[$i - 1], $nums[$i]);
        }
        for ($j = $size - 1; $j > 0; $j--) {
            if ($nums[$j] <= $minArray[$j]) {
                continue;
            }
            while (!$stack->isEmpty() && $stack->top() <= $minArray[$j]) {
                $stack->pop();
            }
            if (!$stack->isEmpty() && $stack->top() < $nums[$j]) {
                return true;
            }
            $stack->push($nums[$j]);
        }

        return false;
    }
}

