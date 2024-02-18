<?php

class Solution
{

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows)
    {
        $arTriangle = [[1]];
        if ($numRows == 0) {
            return [];
        }

        for ($i = 1; $i < $numRows; $i++) {
            $rowPrev = $arTriangle[$i - 1];
            $row = [1];
            for ($j = 1; $j < $i; $j++) {
                $row[] = $rowPrev[$j - 1] + $rowPrev[$j];
            }
            $row[] = 1;
            $arTriangle[] = $row;
        }

        return $arTriangle;
    }

}
