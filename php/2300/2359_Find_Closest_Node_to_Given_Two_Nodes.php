<?php

class Solution
{

    /**
     * @param Integer[] $edges
     * @param Integer $node1
     * @param Integer $node2
     * @return Integer
     */
    function closestMeetingNode($edges, $node1, $node2)
    {
        $edgesCount = count($edges);
        $dist1 = array_fill(0, $edgesCount, PHP_INT_MAX);
        $dist2 = array_fill(0, $edgesCount, PHP_INT_MAX);

        $this->bfs($node1, $edges, $dist1);
        $this->bfs($node2, $edges, $dist2);

        $minDistNode = -1;
        $minDistTillNow = PHP_INT_MAX;
        for ($currNode = 0; $currNode < $edgesCount; $currNode++) {
            if ($minDistTillNow > max($dist1[$currNode], $dist2[$currNode])) {
                $minDistNode = $currNode;
                $minDistTillNow = max($dist1[$currNode], $dist2[$currNode]);
            }
        }

        return $minDistNode;
    }

    protected function bfs($startNode, &$edges, &$dist)
    {
        $edgesCount = count($edges);
        $queue = [$startNode];
        $arVisit = [];
        $dist[$startNode] = 0;

        while (!empty($queue)) {
            $node = array_shift($queue);
            if ($arVisit[$node]) {
                continue;
            }

            $arVisit[$node] = true;
            $neighbor = $edges[$node];
            if ($neghbor != -1 && !$arVisit[$neighbor]) {
                $dist[$neighbor] = 1 + $dist[$node];
                $queue[] = $neighbor;
            }
        }
    }

}
