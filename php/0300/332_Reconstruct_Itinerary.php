<?php

class Solution 
{

    /**
     * @param String[][] $tickets
     * @return String[]
     */
    function findItinerary($tickets) 
    {
        $graph = [];
        
        foreach ($tickets as $ticket) {
            $graph[$ticket[0]][] = $ticket[1];
        }
        
        foreach ($graph as $key => $destinations) {
            rsort($graph[$key]);
        }
        
        $itinerary = [];
        
        $dfs = function($airport) use (&$graph, &$itinerary, &$dfs) {
            while (!empty($graph[$airport])) {
                $dfs(array_pop($graph[$airport]));
            }
            $itinerary[] = $airport;
        };
        
        $dfs("JFK");
        $itinerary = array_reverse($itinerary);
        
        return $itinerary;
    }
}

