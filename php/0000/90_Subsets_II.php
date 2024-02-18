<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums) 
    {
        $n = count($nums);
        sort($nums);
        $seen = [];

        foreach (range(0, 1 << $n) as $mask) {
            $subset = [];
            for ($i = 0; $i < $n; $i++) {
                $bit = ($mask >> $i) & 1;  
                if ($bit == 1) {
                    $subset[] = $nums[$i];
                }
            }
            $seen[serialize($subset)] = $subset;
        }

        return $seen;
    }
}
