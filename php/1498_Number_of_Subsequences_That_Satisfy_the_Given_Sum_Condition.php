<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function numSubseq($nums, $target) 
    {
        sort($nums);
        $result = 0;
        $numsCount = count($nums); 
        $left = 0;
        $right = $numsCount - 1;
        $mod = 1e9 + 7;
        $pows = array_fill(0, $numsCount, 1);

        for ($i = 1; $i < $numsCount ; ++$i) {
            $pows[$i] = $pows[$i - 1] * 2 % $mod;
        }
        while ($left <= $right) {
            if ($nums[$left] + $nums[$right] > $target) {
                $right--;
            } else {
                $result = ($result + $pows[$right - $left++]) % $mod;
            }
        }

        return $result;
    }
}

