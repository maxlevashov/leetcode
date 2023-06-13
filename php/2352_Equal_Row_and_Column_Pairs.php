<?php

class Solution 
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function equalPairs($grid) 
    {
        $result = 0;
        $map = [];
        $height = count($grid);
        $width = count($grid[0]);

        for ($i = 0; $i < $height; $i++) {
            $map[serialize($grid[$i])]++;
        }
        
        for ($i = 0; $i < $width; $i++) {
            $temp = [];

            for ($j = 0; $j < $height; $j++) {
                $temp[] = $grid[$j][$i];
            }

            $result += $map[serialize($temp)];
        }
    
        return $result;
    }
}

