<?php

class Solution 
{

    /**
     * @param Integer[][] $pairs
     * @return Integer
     */
    function findLongestChain($pairs) 
    {
        $countPairs = count($pairs);
        sort($pairs);
        $dp = array_fill(0, $countPairs, 1);
        $result = 1;

        for ($i = $countPairs - 1; $i >= 0; $i--) {
            for ($j = $i + 1; $j < $countPairs; $j++) {
                if ($pairs[$i][1] < $pairs[$j][0]) {
                    $dp[$i] = max($dp[$i], 1 + $dp[$j]);
                }
            }
            $result = max($result, $dp[$i]);
        }
        return $result;
    }
}

