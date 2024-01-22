<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findErrorNums($nums) 
    {
        $map = [];
        $dupe = 0;
        for ($i = 1; $i < count($nums) + 1; $i++) {
            $map[$i] = $i;
        }

        foreach ($nums as $num) {
            if (isset($map[$num])) {
                unset($map[$num]);
            } else {
                $dupe = $num;
            }
        }
        
        return [$dupe, array_pop($map)];
    }
}

