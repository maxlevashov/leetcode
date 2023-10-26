<?php

class Solution 
{

    const MOD = 1000000007;

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function numFactoredBinaryTrees($arr) 
    {
        sort($arr);
        $set = [];
        $dp = [];
        foreach ($arr as $item) {
            $set[$item] = false;
            $dp[$item] = 1;
        }
        
        foreach ($arr as $i) {
            foreach ($arr as $j) {
                if ($j > sqrt($i)) {
                    break;
                }
                if (
                    $i % $j == 0 && 
                    isset($set[intval($i / $j)])
                ) {
                    $temp = $dp[$j] * $dp[$i / $j];
                    if ($i / $j == $j) {
                        $dp[$i] = ($dp[$i] + $temp) % self::MOD;
                    } else {
                        $dp[$i] = ($dp[$i] + $temp * 2) % self::MOD;
                    }
                }
            }
        }
        
        $result = 0;
        foreach ($dp as $item) {
            $result = ($result + $item) % self::MOD;
        }
        
        return $result;
    }
}

