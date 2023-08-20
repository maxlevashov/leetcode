<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer $m
     * @param Integer[] $group
     * @param Integer[][] $beforeItems
     * @return Integer[]
     */
    function sortItems($n, $m, $group, $beforeItems) 
    {
        $groupId = $m;
        for ($i = 0; $i < $n; $i++) {
            if ($group[$i] == -1) {
                $group[$i] = $groupId;
                $groupId++;
            }
        }
        
        $itemGraph = [];
        $itemIndegree = [];
        for ($i = 0; $i < $n; ++$i) {
            $itemGraph[$i] = [];
        }
        
        $groupGraph = [];
        $groupIndegree = array_fill(0, $groupId, 0);
        for ($i = 0; $i < $groupId; ++$i) {
            $groupGraph[$i] = [];
        }
        
        for ($curr = 0; $curr < $n; $curr++) {
            foreach ($beforeItems[$curr] as $prev) {

                $itemGraph[$prev][] = $curr;
                $itemIndegree[$curr]++;
                
                if ($group[$curr] != $group[$prev]) {
                    $groupGraph[$group[$prev]][] = $group[$curr];
                    $groupIndegree[$group[$curr]]++;
                }
            }
        }

        $itemOrder = $this->topologicalSort($itemGraph, $itemIndegree);
        $groupOrder = $this->topologicalSort($groupGraph, $groupIndegree);
        
        if (empty($itemOrder) || empty($groupOrder)) {
            return [];
        }
        
        $orderedGroups = [];
        foreach ($itemOrder as $item) {
            $orderedGroups[$group[$item]][] = $item;
        }
        
        $answerList = [];
        foreach ($groupOrder as $groupIndex) {
            if (isset($orderedGroups[$groupIndex])) {
                $answerList = array_merge($answerList, $orderedGroups[$groupIndex]);
            }
        }
        
        return $answerList;
    }

    protected function topologicalSort($graph, $indegree) 
    {
        $visited = [];
        $stack = new SplStack();
        foreach ($graph as $key => $value) {
            if ($indegree[$key] == 0) {
                $stack->push($key);
            }
        }
        
        while (!$stack->isEmpty()) {
            $curr = $stack->pop();
            $visited[] = $curr;
            
            foreach ($graph[$curr] as $prev) {
                $indegree[$prev]--;
                if ($indegree[$prev] == 0) {
                    $stack->push($prev);
                }
            }
        }

        return count($visited) == count($graph) ? $visited : [];
    }
}



