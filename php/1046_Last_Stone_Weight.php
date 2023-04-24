<?php

class Solution 
{

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) 
    {
        if (count($stones) == 1) {
            return current($stones);
        }
        rsort($stones);
        
        while (count($stones) > 1) {
            if ($stones[0] - $stones[1] > 0) {
                $stones[0] = $stones[0] - $stones[1];
                unset($stones[1]);

            } elseif ($stones[0] - $stones[1] == 0) {
                unset($stones[1]);
                unset($stones[0]);
            }
            rsort($stones);
        }
        
        return empty($stones) ? 0 : current($stones);
    }
}

