<?php

class Solution 
{

    /**
     * @param String $senate
     * @return String
     */
    function predictPartyVictory($senate) 
    {
        $radiantQueue = new SplQueue();
        $direQueue = new SplQueue();
        $senateLen = strlen($senate);

        for ($i = 0; $i < $senateLen; $i++) {
            $senate[$i] == 'R' ? $radiantQueue->enqueue($i) : $direQueue->enqueue($i);
        }
        while (!$radiantQueue->isEmpty() && !$direQueue->isEmpty()) {
            $radiantIndex = $radiantQueue->dequeue();
            $direIndex = $direQueue->dequeue();
            $radiantIndex < $direIndex 
                ? $radiantQueue->enqueue($radiantIndex + $senateLen) 
                : $direQueue->enqueue($direIndex + $senateLen);
        }

        return $radiantQueue->count() > $direQueue->count() ? "Radiant" : "Dire";
    }
}

