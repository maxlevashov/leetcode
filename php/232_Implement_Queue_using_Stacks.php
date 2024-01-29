<?php

class MyQueue 
{

    protected $stack1;
    protected $stack2;
    protected int $front = 0;

    /**
     */
    function __construct() 
    {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }
  
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) 
    {
        if ($this->stack1->isEmpty()) {
            $this->front = $x;
        }
            
        while (!$this->stack1->isEmpty()) {
            $this->stack2->push($this->stack1->pop());
        }
            
        $this->stack2->push($x);
        while (!$this->stack2->isEmpty()) {
            $this->stack1->push($this->stack2->pop());
        }
    }
  
    /**
     * @return Integer
     */
    function pop() 
    {
        $result = $this->stack1->pop();
        if (!$this->stack1->isEmpty()) {
            $this->front = $this->stack1->top();
        }
        return $result;
    }
  
    /**
     * @return Integer
     */
    function peek() 
    {
        return $this->front;
    }
  
    /**
     * @return Boolean
     */
    function empty() 
    {
        return $this->stack1->isEmpty();
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */

