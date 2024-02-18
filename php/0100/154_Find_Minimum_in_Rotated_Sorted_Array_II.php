<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) 
    {
        $left = 0;
        $right = count($nums) - 1;

        while ($left < $right) {
            $mid = intval(($right + $left) / 2);
            if ($nums[$mid] > $nums[$right]) { 
                $left = $mid + 1;
            } elseif ($nums[$mid] < $nums[$left]) { 
                $right = $mid;
                $left++;
            } else { 
                $right--;
            }
        }
        
        return $nums[$left];
    }
}

