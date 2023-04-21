<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer $minProfit
     * @param Integer[] $group
     * @param Integer[] $profit
     * @return Integer
     */
    function profitableSchemes($n, $minProfit, $group, $profit) 
    {
        $mod = 1000000007;
        $dp = array_fill(
            0, 
            $minProfit + 1, 
            array_fill(0, $n + 1, 0)
        );
        $dp[0][0] = 1;
        
        for ($k = 0; $k < count($group); $k++) {
            $groupItem = $group[$k];
            $profitItem = $profit[$k];
            for ($i = $minProfit; $i >= 0; $i--) {
                for ($j = $n - $groupItem; $j >= 0; $j--) {
                    $newProfit = min($i + $profitItem, $minProfit);
                    $dp[$newProfit][$j + $groupItem] += $dp[$i][$j];
                    $dp[$newProfit][$j + $groupItem] %= $mod;
                }
            }
        }
        
        $sum = 0;
        for ($i = 0; $i <= $n; $i++) {
            $sum += $dp[$minProfit][$i];
            $sum %= $mod;
        }
        
        return $sum;
    }
}

