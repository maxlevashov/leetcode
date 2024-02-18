<?php

class Solution 
{

    /**
     * @param Integer[] $heights
     * @param Integer $bricks
     * @param Integer $ladders
     * @return Integer
     */
    function furthestBuilding($heights, $bricks, $ladders) 
    {
        $queue = new SplPriorityQueue();
        $i = 0;
        $diff = 0; 
        
        for ($i = 0; $i < count($heights) - 1; $i++) { 
            $diff = $heights[$i + 1] - $heights[$i];
            
            if ($diff <= 0){
                continue;
            }

            $bricks -= $diff; 
            $queue->insert($diff, $diff); 
       
            if ($bricks < 0){
                $bricks += $queue->extract(); 
                $ladders--;
            }

            if ($ladders < 0) {
                break;
            }
        }
        
        return $i;
    }
}

