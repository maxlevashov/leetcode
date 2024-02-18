<?php

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $redEdges
     * @param Integer[][] $blueEdges
     * @return Integer[]
     */
    function shortestAlternatingPaths($n, $redEdges, $blueEdges)
    {
        $adj = [];
        foreach ($redEdges as $redEdge) {
            $adj[$redEdge[0]][] = [$redEdge[1], 0];
        }
        foreach ($blueEdges as $blueEdge) {
            $adj[$blueEdge[0]][] = [$blueEdge[1], 1];
        }

        $answer = array_fill(0, $n, -1);
        $queue[] = [0, 0, -1];
        $visit[0][1] = $visit[0][0] = true;
        $answer[0] = 0;

        while (!empty($queue)) {
            $element = array_shift($queue);
            $node = $element[0];
            $steps = $element[1];
            $prevColor = $element[2];

            foreach ($adj[$node] as $item) {
                $neighbor = $item[0];
                $color = $item[1];
                if (
                    !$visit[$neighbor][$color] 
                    && $color !== $prevColor
                ) {
                    $visit[$neighbor][$color] = true;
                    $queue[] = [$neighbor, 1 + $steps, $color];
                    if ($answer[$neighbor] == -1) {
                        $answer[$neighbor] = 1 + $steps;
                    }
                }
            }
        }
        return $answer;
    }

}
