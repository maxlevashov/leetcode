<?php

class Solution 
{

    /**
     * @param String[] $garbage
     * @param Integer[] $travel
     * @return Integer
     */
    function garbageCollection($garbage, $travel) 
    {
        $prefixSum = array_fill(0, count($travel) + 1, 0);
        $prefixSum[1] = $travel[0];
        for ($i = 1; $i < count($travel); $i++) {
            $prefixSum[$i + 1] = $prefixSum[$i] + $travel[$i];
        }
        
        $garbageLastPos = [];
        $garbageCount = [];
        for ($i = 0; $i < count($garbage); $i++) {
            for ($j = 0; $j < strlen($garbage[$i]); $j++) {
                $garbageLastPos[$garbage[$i][$j]] = $i;
                $garbageCount[$garbage[$i][$j]]++;
            }
        }
        
        $garbageTypes = ['M', 'P', 'G'];
        $result = 0;
        var_dump($garbageCount);
        foreach ($garbageTypes as $c) {
            if (isset($garbageCount[$c])) {
                $result += $prefixSum[$garbageLastPos[$c]] + $garbageCount[$c];
            }
        }
        
        return $result;
    }
}
