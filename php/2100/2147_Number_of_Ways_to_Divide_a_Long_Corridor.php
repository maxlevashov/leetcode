<?php

class Solution 
{

    /**
     * @param String $corridor
     * @return Integer
     */
    function numberOfWays($corridor) 
    {
        $MOD = 1e9 + 7;
        $len = strlen($corridor);
        $count = array_fill(0, $len + 1, array_fill(0, 3, 0));

        $count[$len][0] = 0;
        $count[$len][1] = 0;
        $count[$len][2] = 1;

        for ($index = $len - 1; $index >= 0; $index--) {
            if ($corridor[$index] == 'S') {
                $count[$index][0] = $count[$index + 1][1];
                $count[$index][1] = $count[$index + 1][2];
                $count[$index][2] = $count[$index + 1][1];
            } else {
                $count[$index][0] = $count[$index + 1][0];
                $count[$index][1] = $count[$index + 1][1];
                $count[$index][2] = ($count[$index + 1][0] + $count[$index + 1][2]) % $MOD;
            }
        }

        return $count[0][0];
    }
}

