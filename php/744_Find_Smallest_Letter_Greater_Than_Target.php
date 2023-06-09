<?php

class Solution 
{

    /**
     * @param String[] $letters
     * @param String $target
     * @return String
     */
    function nextGreatestLetter($letters, $target) 
    {
        $low = 0;
        $high = count($letters) - 1;
        
        if (
            $letters[0] > $target 
            || $target >= $letters[$high]
        ) {
            return $letters[0];
        } 

        $result = '';  
        
        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);
            
            if ($letters[$mid] > $target) {
                $result = $letters[$mid];
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }

        }
        
        return $result;
    }
}

