<?php

class Solution 
{

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function heightChecker($heights) 
    {
        $expected = $heights;
        sort($expected);
        $countIndices = 0;
        foreach ($heights as $key => $height) {
            if ($height != $expected[$key]) {
                $countIndices++;
            }
        }
        
        return $countIndices;
    }
}

