<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findDuplicate($nums) 
    {
        $map = [];
        foreach ($nums as $num) {
            if (isset($map[$num])) {
                return $num;
            }
            $map[$num] = false;
        }

        return 0;
    }
}

