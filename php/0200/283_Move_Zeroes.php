<?php

class Solution 
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) 
    {
        for ($i = count($nums) - 1; $i >= 0; $i--) {
            if ($nums[$i] == 0) {
                for ($j = $i; $j < count($nums); $j++) {
                    $nums[$j] = intval($nums[$j + 1]);
                }
            }
        }
    }
}

