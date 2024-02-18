<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function minDeletions($s) 
    {
        $map = [];
        $count = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            $map[$s[$i]]++; 
        }
        $queue = new SplPriorityQueue();

        foreach ($map as $item) {
            $queue->insert($item, $item);
        }

        while ($queue->count() != 1) {
            $top = $queue->extract(); 
            if ($queue->top() == $top && $top != 0) {
                $count++; 
                $queue->insert($top - 1, $top - 1); 
            }
        }

        return $count;
    }
}

