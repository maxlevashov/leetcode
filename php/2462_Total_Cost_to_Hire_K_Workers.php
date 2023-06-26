<?php

class Solution 
{

    /**
     * @param Integer[] $costs
     * @param Integer $k
     * @param Integer $candidates
     * @return Integer
     */
    function totalCost($costs, $k, $candidates) 
    {
        $headWorkers = new SplPriorityQueue();
        $tailWorkers = new SplPriorityQueue();
        
        for ($i = 0; $i < $candidates; $i++) {
            $headWorkers->insert($costs[$i], -$costs[$i]);
        }
        for (
            $i = max($candidates, count($costs) - $candidates); 
            $i < count($costs); 
            $i++
        ) {
            $tailWorkers->insert($costs[$i], -$costs[$i]);
        }

        $answer = 0;
        $nextHead = $candidates;
        $nextTail = count($costs) - 1 - $candidates;

        for ($i = 0; $i < $k; $i++) {
            if (
                $tailWorkers->isEmpty() 
                || !$headWorkers->isEmpty() 
                && $headWorkers->top() <= $tailWorkers->top()
            ) {
                $answer += $headWorkers->extract();
                
                if ($nextHead <= $nextTail) {
                    $headWorkers->insert($costs[$nextHead], -$costs[$nextHead]);
                    $nextHead++;
                }
            } else {
                $answer += $tailWorkers->extract();

                if ($nextHead <= $nextTail) {
                    $tailWorkers->insert($costs[$nextTail], -$costs[$nextTail]);
                    $nextTail--;
                }
            }
        }

        return $answer;
    }
}

