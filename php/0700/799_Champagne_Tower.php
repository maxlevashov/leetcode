<?php

class Solution 
{

    /**
     * @param Integer $poured
     * @param Integer $query_row
     * @param Integer $query_glass
     * @return Float
     */
    function champagneTower($poured, $query_row, $query_glass) 
    {
        $currRow = array_fill(0, 1, $poured);
		
        for ($i = 0; $i <= $query_row; $i++) { 
            $nextRow = array_fill(0, $i + 2, 0); 
            for ($j = 0; $j <= $i; $j++) { 
                if ($currRow[$j] >= 1) {
                    $nextRow[$j] += ($currRow[$j] - 1) / 2.0;
                    $nextRow[$j + 1] += ($currRow[$j] - 1) / 2.0; 
                    $currRow[$j] = 1; 
                }
            }
            if ($i != $query_row) {
                $currRow = $nextRow;
            } 
        }

        return $currRow[$query_glass];
    }
}

