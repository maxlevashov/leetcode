<?php

class Solution 
{

    protected $countEvents = 0;
    protected $events = [];

    /**
     * @param Integer[][] $events
     * @param Integer $k
     * @return Integer
     */
    function maxValue($events, $k) 
    {
        $this->countEvents = count($events);
        $this->events = $events;
        sort($this->events);
        
        $dp = array_fill(0, $this->countEvents + 1, array_fill(0, $k + 1, -1));
        
        return $this->maxValueRecursive($dp, 0, $k);
    }

    protected function maxValueRecursive(array &$dp, int $pos, int $k)
    {   
        if ($pos >= $this->countEvents || $k == 0) {
            return 0;
        }
        if ($dp[$pos][$k] != -1) {
            return $dp[$pos][$k];
        }
        
        for ($i = $pos + 1; $i < $this->countEvents; $i++) {
            if ($this->events[$i][0] > $this->events[$pos][1]) {
                break;
            }
        }
        
        return $dp[$pos][$k] = max(
            $this->maxValueRecursive($dp, $pos + 1, $k), 
            $this->events[$pos][2] + $this->maxValueRecursive($dp, $i, $k - 1)
        );

    }
}

