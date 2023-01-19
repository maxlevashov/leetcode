<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraysDivByK($nums, $k)
    {
        $prefixMod = 0;
        $result = 0;
        $arModGroups[0] = 1;
        foreach ($nums as $num) {
            $prefixMod = ($prefixMod + $num % $k + $k) % $k;
            $result += $arModGroups[$prefixMod];
            $arModGroups[$prefixMod]++;
        }

        return $result;
    }

}
