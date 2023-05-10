<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) 
    {
        $element = $nums[0];
        $count = 0;

        foreach ($nums as $num) {
            if ($count == 0) {
                $element = $num;
            }
           
            $count += $element == $num ? 1: -1;
        }

        return $element;
    }
}

