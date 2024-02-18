<?php

class Solution 
{

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer
     */
    function getWinner($arr, $k) 
    {
        $maxElement = $arr[0];
        $queue = new SplQueue();
        for ($i = 1; $i < count($arr); $i++) {
            $maxElement = max($maxElement, $arr[$i]);
            $queue->push($arr[$i]);
        }
        
        $curr = $arr[0];
        $winstreak = 0;
        while (!$queue->isEmpty()) {
            $opponent = $queue->shift();
            
            if ($curr > $opponent) {
                $queue->push($opponent);
                $winstreak++;
            } else {
                $queue->push($curr);
                $curr = $opponent;
                $winstreak = 1;
            }
            
            if ($winstreak == $k || $curr == $maxElement) {
                return $curr;
            }
        }
        
        return -1;
    }
}

