<?php

class MyStack 
{

    protected $queue;

    /**
     * 
    */
    function __construct() 
    {
        $this->queue = new SplQueue();
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) 
    {
        $this->queue->push($x);
    }
  
    /**
     * @return Integer
     */
    function pop() 
    {
        return $this->queue->pop();
    }
  
    /**
     * @return Integer
     */
    function top() 
    {
        return $this->queue->top();
    }
  
    /**
     * @return Boolean
     */
    function empty() 
    {
        return $this->queue->isEmpty();
    }
}

/**
 * Your MyStack object will be instantiated and called as such:
 * $obj = MyStack();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->empty();
 */
