<?php

class KthLargest 
{

    protected $queue;
    protected $k = 0;

    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums) 
    {
        $this->queue = new SplPriorityQueue();
        $this->k = $k;
        foreach ($nums as $num) {
            $this->queue->insert($num, -$num);
        }
    }
  
    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val) 
    {
        $this->queue->insert($val, -$val);

        while ($this->queue->count() > $this->k) {
            $this->queue->extract();
        }

        return $this->queue->top();
    }

}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */

