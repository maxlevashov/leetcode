<?php

class Solution 
{

    /**
     * @param Integer[][] $graph
     * @return Integer
     */
    function shortestPathLength($graph) 
    {
        $size = count($graph); 
        $queue = new SplQueue(); 
        $visited = [];
        $all = (1 << $size) - 1; 
        for ($i = 0; $i < $size; $i++) {
            $maskValue = (1 << $i); 
            $thisNode = new Tuple($i, $maskValue, 1); 
            $queue->push($thisNode); 
            $visited[serialize($i . $maskValue)] = false; 
        }

        while (!$queue->isEmpty()) {
            $curr = $queue->shift(); 
            if ($curr->mask == $all) {
                return $curr->cost - 1;
            }
            
            foreach ($graph[$curr->node] as $adj) {
                $bothVisitedMask = $curr->mask; 
                $bothVisitedMask = $bothVisitedMask | (1 << $adj);    
                $thisNode = new Tuple($adj, $bothVisitedMask, $curr->cost + 1);
                if (!isset($visited[serialize($adj . $bothVisitedMask)])) {
                    $visited[serialize($adj . $bothVisitedMask)] = false;  
                    
                    $queue->push($thisNode); 
                }
            }
        }
        
        return -1;
    }
}

class Tuple
{

    public int $node; 
    public int $mask; 
    public int $cost; 

    public function __construct(int $node, int $mask, int $cost)
    {
        $this->node = $node;
        $this->mask = $mask;
        $this->cost = $cost;
    }
}

