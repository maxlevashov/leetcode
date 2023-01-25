<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target)
    {
        if (count($matrix) == 0) {
            return false;
        }

        $rows = count($matrix);
        $columns = count($matrix[0]);
        $left = 0;
        $right = $rows * $columns - 1;

        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            $current = $matrix[$mid / $columns][$mid % $columns];
            if ($current == $target) {
                return true;
            } elseif ($target < $current) {
                $right = $mid - 1;
            } elseif ($target > $current) {
                $left = $mid + 1;
            }
        }

        return false;
    }

}
