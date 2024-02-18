<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Float[] $succProb
     * @param Integer $start
     * @param Integer $end
     * @return Float
     */
    function maxProbability($n, $edges, $succProb, $start, $end) 
    {
        $maxProb = array_fill(0, $n, 0.0);
        $maxProb[$start] = 1.0;

        for ($i = 0; $i < $n - 1; $i++) {
            $hasUpdate = false;
            for ($j = 0; $j < count($edges); $j++) {
                $u = $edges[$j][0];
                $v = $edges[$j][1];
                $pathProb = $succProb[$j];
                if ($maxProb[$u] * $pathProb > $maxProb[$v]) {
                    $maxProb[$v] = $maxProb[$u] * $pathProb;
                    $hasUpdate = true;
                }
                if ($maxProb[$v] * $pathProb > $maxProb[$u]) {
                    $maxProb[$u] = $maxProb[$v] * $pathProb;
                    $hasUpdate = true;
                }
            }
            if (!$hasUpdate) {
                break;
            }
        }

        return $maxProb[$end];
    }
}
