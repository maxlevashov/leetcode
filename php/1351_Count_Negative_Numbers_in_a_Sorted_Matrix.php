<?php

class Solution 
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function countNegatives($grid) 
    {
        $count = 0;
        $n = count($grid[0]);

        foreach ($grid as $row) {
            $left = 0;
            $right = $n - 1;
            while ($left <= $right) {
                $mid = floor(($right + $left) / 2);
                if ($row[$mid] < 0) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            }

            $count += ($n - $left);
        }

        return $count;
    }
}

