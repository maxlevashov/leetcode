<?php

class Solution 
{

    /**
     * @param String[][] $equations
     * @param Float[] $values
     * @param String[][] $queries
     * @return Float[]
     */
    function calcEquation($equations, $values, $queries) 
    {
        $result = [];
        $map = [];
        $graph = [];

        for ($i = 0; $i < count($equations); $i++) {
            $u = $equations[$i][0];
            $v = $equations[$i][1];
            $map[$u . "->" . $v] = $values[$i];
            $map[$v . "->" . $u] = 1 / $values[$i];
            $graph[$u][] = $v;
            $graph[$v][] = $u;
        }
        for ($i = 0; $i < count($queries); $i++) {
            $start = $queries[$i][0];
            $end = $queries[$i][1];
            if (!isset($graph[$start]) || !isset($graph[$end])) {
                $result[] = -1;
            } else {
                $val = 1;
                $visited = [];
                $isFound = false;
                if ($start == $end){
                    $isFound = true;
                } else {
                    $this->dfs($start, $end, $map, $graph, $val, $visited, $isFound);
                }
                if ($isFound) {
                    $result[] = $val;
                } else {
                    $result[] = -1;
                }
                
            }
        }
        return $result;
    }

    protected function dfs(
        string $start,
        string $end,
        & $map,
        & $graph,
        & $val,
        & $visited,
        & $isFound
    ) {
        $visited[$start] = 1;
    
        if ($isFound) {
            return ;
        }
        foreach ($graph[$start] as $child) {
            if ($visited[$child] != 1) {
                $val *= $map[$start . "->" . $child];
                if ($end == $child) {
                    $isFound = true;
                    return ;
                }
                $this->dfs($child, $end, $map, $graph, $val, $visited, $isFound);
                if ($isFound) {
                    return ;
                } else {
                    $val /= $map[$start . "->" . $child];
                }
            }
        }  
    }
}

