<?php

class Solution 
{

    /**
     * @param String $s
     * @return String
     */
    function frequencySort($s) 
    {
        $queue = new SplPriorityQueue();
        $count = [];
        
        for ($i = 0; $i < strlen($s); $i++) {
            $count[$s[$i]] = ((int)$count[$s[$i]]) + 1;
        }
        
        foreach ($count as $char => $value) {
            $queue->insert($char, $value);
        }
        
        $result = '';
        while (!$queue->isEmpty()) {
            $char = $queue->extract();
            $result .= str_repeat($char, $count[$char]);
        }

        return $result;
    }
}

