<?php

class Solution 
{

    /**
     * @param String $path
     * @return Boolean
     */
    function isPathCrossing($path) 
    {
        $moves['N'] = [0, 1];
        $moves['S'] = [0, -1];
        $moves['W'] = [-1, 0];
        $moves['E'] = [1, 0];
        $visited["0,0"] = true;
        $x = 0;
        $y = 0;
        
        for ($i = 0; $i < strlen($path); $i++) {
            $curr = $moves[$path[$i]];
            $dx = $curr[0];
            $dy = $curr[1];
            $x += $dx;
            $y += $dy;
            
            $hash = $x . "," . $y;
            if (isset($visited[$hash])) {
                return true;
            }
            
            $visited[$hash] = true;
        }
        
        return false;
    }
}

