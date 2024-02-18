<?php

class Solution 
{

    /**
     * @param Integer[][] $routes
     * @param Integer $source
     * @param Integer $target
     * @return Integer
     */
    function numBusesToDestination($routes, $source, $target) 
    {
        if ($source == $target) {
            return 0;
        }

        $adjList = [];
        for ($route = 0; $route < count($routes); $route++) {
            foreach ($routes[$route] as $stop) {
                $adjList[$stop][] = $route;
            }
        }

        $queue = new SplQueue();
        $vis = [];
        foreach ($adjList[$source] as $route) {
            $queue->push($route);
            $vis[$route] = true;
        }

        $busCount = 1;
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            for ($i = 0; $i < $size; $i++) {
                $route = $queue->shift();
                foreach ($routes[$route] as $stop) {
                    if ($stop == $target) {
                        return $busCount;
                    }
                    foreach ($adjList[$stop] as $nextRoute) {
                        if (!isset($vis[$nextRoute])) {
                            $vis[$nextRoute] = true;
                            $queue->push($nextRoute);
                        }
                    }
                }
            }
            $busCount++;
        }

        return -1;
    }
}

