<?php

class Solution 
{

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function numberOfArrays($s, $k) 
    {
        $mod = (int)1e9+7;
        $stringLen = strlen($s);
        $dp = array_fill(0, $stringLen, 0);
        $dp[strlen($s)] = 1;
        for ($i = $stringLen - 1; $i >= 0; $i--) {
            $num = 0;
            $sum = 0;
            for ($j = $i; $j < $stringLen; $j++) {
                $num = $num * 10 + ($s[$j] - '0');
                if ($num == 0 || $num > $k) {
                    break;
                }
                    
                $sum += $dp[$j + 1];
            }
            $dp[$i] = (int)($sum % $mod);
        }
        return $dp[0];
    }


}

