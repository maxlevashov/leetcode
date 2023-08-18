<?php

class Solution 
{

    /**
     * @param Integer[][] $mat
     * @return Integer[][]
     */
    function updateMatrix($mat) 
    {
        $height = count($mat);
        $width = count($mat[0]); 
        $inf = $height + $width; 
        for ($r = 0; $r < $height; $r++) {
            for ($c = 0; $c < $width; $c++) {
                if ($mat[$r][$c] == 0) {
                    continue;
                }
                $top = $inf;
                $left = $inf;
                if ($r - 1 >= 0) {
                    $top = $mat[$r - 1][$c];
                }
                if ($c - 1 >= 0) {
                    $left = $mat[$r][$c - 1];
                }
                $mat[$r][$c] = min($top, $left) + 1;
            }
        }
        for ($r = $height - 1; $r >= 0; $r--) {
            for ($c = $width - 1; $c >= 0; $c--) {
                if ($mat[$r][$c] == 0) {
                    continue;
                }
                $bottom = $inf;
                $right = $inf;
                if ($r + 1 < $height) {
                    $bottom = $mat[$r + 1][$c];
                }
                if ($c + 1 < $width) {
                    $right = $mat[$r][$c + 1];
                }
                $mat[$r][$c] = min($mat[$r][$c], min($bottom, $right) + 1);
            }
        }
        return $mat;
    }
}

