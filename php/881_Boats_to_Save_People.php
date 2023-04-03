<?php

class Solution 
{

    /**
     * @param Integer[] $people
     * @param Integer $limit
     * @return Integer
     */
    function numRescueBoats($people, $limit) 
    {
        sort($people);
        $numberBoats = 0;
        $left = 0;
        $right = count($people) - 1;
        
        while ($left <= $right) {
            $sum = $people[$left] + $people[$right];
            if ($sum <= $limit) {
                $left++;
                $right--;
                $numberBoats++;
            }else {
                $numberBoats++;
                $right--;
            }
        }

        return $numberBoats;
    }
}

