<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer
     */
    function findLeastNumOfUniqueInts($arr, $k) 
    {
        $map = [];
        foreach ($arr as $num) {
            $map[$num]++;
        }
        $n = count($arr);
        $countOfFrequencies = array_fill(0, $n + 1, 0);
        foreach ($map as $it) {
            $countOfFrequencies[$it]++;
        }
        $remainingUniqueElements = count($map);

        for ($i = 1; $i <= $n; $i++) {
            $numElementsToRemove = min((int) ($k / $i), $countOfFrequencies[$i]);

            $k -= ($i * $numElementsToRemove);
            $remainingUniqueElements -= $numElementsToRemove;

            if ($k < $i) {
                return $remainingUniqueElements;
            }
        }


        return 0;

    }
}

