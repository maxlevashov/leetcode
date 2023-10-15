<?php

class Solution 
{

    /**
     * @param Integer $steps
     * @param Integer $arrLen
     * @return Integer
     */
    function numWays($steps, $arrLen) 
    {
        $mod = (int) 1e9 + 7;
        $arrLen = min($arrLen, $steps);
        $dp = array_fill(0, $arrLen, array_fill(0, $steps + 1, 0));
        $dp[0][0] = 1;
        
        for ($remain = 1; $remain <= $steps; $remain++) {
            for ($curr = $arrLen - 1; $curr >= 0; $curr--) {
                $ans = $dp[$curr][$remain - 1];
                
                if ($curr > 0) {
                    $ans = ($ans + $dp[$curr - 1][$remain - 1]) % $mod;
                }
                
                if ($curr < $arrLen - 1) {
                    $ans = ($ans + $dp[$curr + 1][$remain - 1]) % $mod;
                }
                
                $dp[$curr][$remain] = $ans;
            }
        }
        
        return $dp[0][$steps];
    }
}

