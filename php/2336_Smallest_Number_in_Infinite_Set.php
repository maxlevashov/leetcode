<?php

class SmallestInfiniteSet 
{

    protected $queue = null;
    protected $current = 0;

    /**
     */
    function __construct() 
    {
        $this->queue = new SplPriorityQueue();
        $this->current = 1;
    }
  
    /**
     * @return Integer
     */
    function popSmallest() 
    {
        $result = $this->current;

        if (!$this->queue->isEmpty() && $this->queue->top() < $this->current) {
            $result = $this->queue->extract();
        } else {
            $this->current++;
        }

        while (!$this->queue->isEmpty() && $this->queue->top() == $result) {
            $this->queue->extract();
        }

        return $result;
    }
  
    /**
     * @param Integer $num
     * @return NULL
     */
    function addBack($num) {
        $this->queue->insert($num, -$num);
    
    }


        
}

/**
 * Your SmallestInfiniteSet object will be instantiated and called as such:
 * $obj = SmallestInfiniteSet();
 * $ret_1 = $obj->popSmallest();
 * $obj->addBack($num);
 */

