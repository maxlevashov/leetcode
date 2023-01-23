<?php

class RecentCounter
{

    protected $queue = [];

    /**
     */
    function __construct()
    {
        
    }

    /**
     * @param Integer $t
     * @return Integer
     */
    function ping($t)
    {
        $this->queue[] = $t;
        while ($this->queue[array_key_first($this->queue)] < $t - 3000) {
            array_shift($this->queue);
        }

        return count($this->queue);
    }

}



