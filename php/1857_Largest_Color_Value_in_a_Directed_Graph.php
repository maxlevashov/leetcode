<?php

class Solution 
{


    /**
     * @param String $colors
     * @param Integer[][] $edges
     * @return Integer
     */
    function largestPathValue($colors, $edges)
    {
        $n = strlen($colors);
        $k = 26;
        $indegrees = array_fill(0, $n, 0);
        $graph = array_fill(0, $n, []);

        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $graph[$u][] = $v;
            $indegrees[$v]++;
        }

        $zeroIndegree = [];

        for ($i = 0; $i < $n; $i++) {
            if ($indegrees[$i] == 0) {
                $zeroIndegree[$i] = $i;
            }
        }
        ksort($zeroIndegree);
        $counts = array_fill(0, $n, array_fill(0, $k, 0));

        for ($i = 0; $i < $n; $i++) {
            $counts[$i][ord($colors[$i]) - ord('a')]++;
        }
        
        $maxCount = 0;
        $visited = 0;
  
        while (!empty($zeroIndegree)) {
            $u = current($zeroIndegree);
            unset($zeroIndegree[$u]);         
            $visited++;
            foreach ($graph[$u] as $v) {
                for ($i = 0; $i < $k; $i++)
                
                    $counts[$v][$i] = max(
                        $counts[$v][$i], 
                        $counts[$u][$i] + (ord($colors[$v]) - ord('a') == $i ? 1 : 0)
                    );

                $indegrees[$v]--;

                if ($indegrees[$v] === 0) {
                    $zeroIndegree[$v] = $v;
                    
                }
            }
            $maxCount = max($maxCount, max($counts[$u]));
        }

        return $visited == $n ? $maxCount : -1;
    }
}

