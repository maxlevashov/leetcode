<?php

class Solution 
{

    /**
     * @param Integer[][] $mat
     * @param Integer $k
     * @return Integer[]
     */
    function kWeakestRows($mat, $k) 
    {
        $rowStrengths = [];
        foreach ($mat as $keyRow => $row) {
            $strength = 0;
            foreach ($row as $cell) {
                $strength += $cell;
            }
            $rowStrengths[$keyRow][0] = $strength;
            $rowStrengths[$keyRow][1] = $keyRow;
        }

        usort($rowStrengths, fn($a, $b) => 
            $a[0] == $b[0] 
                ? $a[1] - $b[1] 
                : $a[0] - $b[0]);

        $result = [];
        for ($i = 0; $i < $k; ++$i) {
            $result[$i] = $rowStrengths[$i][1];
        }        

        return $result;
    }
}

