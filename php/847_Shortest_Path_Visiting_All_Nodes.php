<?php

class Solution 
{

    /**
     * @param Integer[][] $graph
     * @return Integer
     */
    function shortestPathLength($graph) 
    {
        $n = count($graph); 
        $q = new SplQueue(); 
        $vis = [];
        $all = (1 << $n) - 1; 
        for ($i = 0; $i < $n; $i++) {
            $maskValue = (1 << $i); 
            $thisNode = new Tuple($i, $maskValue, 1); 
            $q->push($thisNode); 
            $vis[serialize($i . $maskValue)] = false; 
        }

        while (!$q->isEmpty()) {
            $curr = $q->shift(); 
            if ($curr->mask == $all) {
                return $curr->cost - 1;
            }
            
            foreach ($graph[$curr->node] as $adj) {
                $bothVisitedMask = $curr->mask; 
                $bothVisitedMask = $bothVisitedMask | (1 << $adj); 
                $thisNode = new Tuple($adj, $bothVisitedMask, $curr->cost + 1);
                
                if (!isset($vis[serialize($adj . $bothVisitedMask)])) {
                    $vis[serialize($adj . $bothVisitedMask)] = false;  
                    
                    $q->push($thisNode); 
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

