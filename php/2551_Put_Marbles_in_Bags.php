<?php

class Solution 
{

    /**
     * @param Integer[] $weights
     * @param Integer $k
     * @return Integer
     */
    function putMarbles($weights, $k) 
    {
        $countWeights = count($weights);
        $pairWeights = array_fill(0, $countWeights - 1, 0);

        for ($i = 0; $i < $countWeights - 1; ++$i) {
            $pairWeights[$i] += $weights[$i] + $weights[$i + 1];
        }
        
        sort($pairWeights);
        
        $answer = 0;
        for ($i = 0; $i < $k - 1; ++$i) {
            $answer += $pairWeights[$countWeights - 2 - $i] - $pairWeights[$i];
        }

        return $answer;
    }
}

