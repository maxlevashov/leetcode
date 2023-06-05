<?php

class Solution 
{

    /**
     * @param Integer[][] $coordinates
     * @return Boolean
     */
    function checkStraightLine($coordinates) 
    {
        $x1 = $coordinates[0][0];
        $y1 = $coordinates[0][1];
        $x2 = $coordinates[1][0];
        $y2 = $coordinates[1][1];
        
        for ($i = 2; $i < count($coordinates); $i++) {
            $x = $coordinates[$i][0];
            $y = $coordinates[$i][1];
            if (($y2 - $y1) * ($x1 - $x) != ($y1 - $y) * ($x2 - $x1)) {
                return false;
            }
        }

        return true;
    }
}

