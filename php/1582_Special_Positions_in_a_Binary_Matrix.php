<?php

class Solution 
{

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function numSpecial($mat) 
    {
        $ans = 0;
        $m = count($mat);
        $n = count($mat[0]);
        
        for ($row = 0; $row < $m; $row++) {
            for ($col = 0; $col < $n; $col++) {
                if ($mat[$row][$col] == 0) {
                    continue;
                }
                
                $good = true;
                for ($r = 0; $r < $m; $r++) {
                    if ($r != $row && $mat[$r][$col] == 1) {
                        $good = false;
                        break;
                    }
                }
                
                for ($c = 0; $c < $n; $c++) {
                    if ($c != $col && $mat[$row][$c] == 1) {
                        $good = false;
                        break;
                    }
                }
                
                if ($good) {
                    $ans++;
                }
            }
        }
        
        return $ans;
    }
}

