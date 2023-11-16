<?php

class Solution 
{

    /**
     * @param String[] $nums
     * @return String
     */
    function findDifferentBinaryString($nums) 
    {
        $result = '';
        for ($i = 0; $i < count($nums); $i++) {
            $curr = $nums[$i][$i];
            $result .= $curr == '0' ? '1' : '0';
        }
        
        return $result;
    }
}

