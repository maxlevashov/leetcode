<?php

class Solution 
{

    /**
     * @param Integer[][] $nums
     * @return Integer[]
     */
    function findDiagonalOrder($nums) 
    {
        $groups = [];
        for ($row = count($nums) - 1; $row >= 0; $row--) {
            for ($col = 0; $col < count($nums[$row]); $col++) {
                $diagonal = $row + $col;
                $groups[$diagonal][] = $nums[$row][$col];
            }
        }
        
        $result = [];
        $curr = 0;
        
        while (isset($groups[$curr])) {
            foreach ($groups[$curr] as $num) {
                $result[] = $num;
            }
            
            $curr++;
        }
        
        return $result;
    }
}

