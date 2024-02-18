<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s) 
    {
        $n = strlen($s);
        if ($n == 0) {
            return 0;
        }
        $dp[$n] = 1;
        for ($i = $n - 1; $i >= 0; $i--) {
            if ($s[$i] == '0') {
                $dp[$i] = 0;
            } else {
                $dp[$i] = $dp[$i + 1];
                if (
                    $i < $n - 1 
                    && ($s[$i] == '1' || $s[$i] == '2' && $s[$i + 1] < '7')
                ) {
                    $dp[$i] += $dp[$i + 2];
                }
            }
        }

        return $dp[0]; 
    }
}


