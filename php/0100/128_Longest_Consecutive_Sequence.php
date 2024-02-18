<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums) 
    {
        $set = array_flip($nums);
        $best = 0;
        
        foreach ($set as $x => $temp) {
            if (!isset($set[$x - 1])) {
                $y = $x + 1;
                while (isset($set[$y])) {
                    $y += 1;
                }
                $best = max($best, $y - $x);
            }
        }

        return $best;
    }
}

