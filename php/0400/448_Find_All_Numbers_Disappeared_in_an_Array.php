<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDisappearedNumbers($nums) 
    {
        $mapNums = [];
        $result = [];
        
        foreach ($nums as $num) {
            $mapNums[$num] = false;
        }
        for ($i = 1; $i <= count($nums); $i++) {
            if (!isset($mapNums[$i])) {
                $result[] = $i;
            }
        }
        
        return $result;
    }
}

