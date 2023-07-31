<?php

class Solution 
{

    /**
     * @param String $s1
     * @param String $s2
     * @return Integer
     */
    function minimumDeleteSum($s1, $s2) 
    {
        $m = strlen($s1);
        $n = strlen($s2);
        $computeCost = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

        for ($i = 1; $i <= $m; $i++) {
            $computeCost[$i][0] = $computeCost[$i - 1][0] + ord($s1[$i - 1]);
        }
        for ($j = 1; $j <= $n; $j++) {
            $computeCost[0][$j] = $computeCost[0][$j - 1] + ord($s2[$j - 1]);
        }
        
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($s1[$i - 1] == $s2[$j - 1]) {
                    $computeCost[$i][$j] = $computeCost[$i - 1][$j - 1];
                } else {
                    $computeCost[$i][$j] = min(
                        ord($s1[$i - 1]) + $computeCost[$i - 1][$j],
                        ord($s2[$j - 1]) + $computeCost[$i][$j - 1]
                    );
                }
            }
        }
        
        return $computeCost[$m][$n];
    }
}

