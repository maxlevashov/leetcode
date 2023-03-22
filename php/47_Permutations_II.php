<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) 
    {
        sort($nums);
        $result = [];
        $this->permuteUniqueRecursion($nums, 0, count($nums), $result);

        return $result;
    }

    protected function permuteUniqueRecursion($nums, $i, $j, &$result) 
    {
        if ($i == $j - 1) {
            $result[] = $nums;
            return;
        }

        for ($k = $i; $k < $j; $k++) {
            if ($i != $k && $nums[$i] === $nums[$k]) {
                continue;
            }

            $this->swap($nums[$i], $nums[$k]);
 
            $this->permuteUniqueRecursion($nums, $i + 1, $j, $result);
        }
    }

    protected function swap(&$x, &$y) {
        list($x, $y) = [$y, $x];
    }

}

