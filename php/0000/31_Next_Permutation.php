<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums)
    {
        $i = count($nums) - 2;
        while ($i >= 0 && $nums[$i + 1] <= $nums[$i]) {
            $i--;
        }
        if ($i >= 0) {
            $j = count($nums) - 1;
            while ($nums[$j] <= $nums[$i]) {
                $j--;
            }
            $this->swap($nums, $i, $j);
        }
        $this->reverse($nums, $i + 1);
    }

    protected function reverse(&$nums, $start)
    {
        $i = $start;
        $j = count($nums) - 1;
        while ($i < $j) {
            $this->swap($nums, $i, $j);
            $i++;
            $j--;
        }
    }

    protected function swap(&$nums, $i, $j)
    {
        $temp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] = $temp;
    }

}
