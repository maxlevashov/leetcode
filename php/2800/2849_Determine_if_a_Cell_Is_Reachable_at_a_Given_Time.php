<?php

class Solution 
{

    /**
     * @param Integer $sx
     * @param Integer $sy
     * @param Integer $fx
     * @param Integer $fy
     * @param Integer $t
     * @return Boolean
     */
    function isReachableAtTime($sx, $sy, $fx, $fy, $t) 
    {
        $width = abs($sx - $fx);
        $height = abs($sy - $fy);
        if ($width == 0 && $height == 0 && $t == 1) {
            return false;
        }
        
        return $t >= max($width, $height);
    }
}

