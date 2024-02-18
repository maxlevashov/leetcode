<?php

class Solution 
{

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    function canFinish($numCourses, $prerequisites) 
    {
        $adj = [];
        $indegree = array_fill(0, $numCourses, 0);
        $result = [];

        foreach ($prerequisites as $node) {
            $adj[$node[0]][] = $node[1];
            $indegree[$node[1]]++;
        }

        $queue = new SplQueue();
        for ($i = 0; $i < $numCourses; $i++) {
            if ($indegree[$i] == 0) {
                $queue->push($i);
            }
        }

        while (!$queue->isEmpty()) {
            $temp = $queue->pop();
            $result[] = $temp;

            foreach ($adj[$temp] as $node) {
                $indegree[$node]--;
                if ($indegree[$node] == 0) {
                    $queue->push($node);
                }
            }
        }

        return count($result) == $numCourses;
    }
}

