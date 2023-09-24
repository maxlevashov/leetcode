<?php

class MedianFinder 
{

    private $small;
    private $large;
    private $even = true;

    /**
     */
    function __construct() 
    {
        $this->small = new SplPriorityQueue();
        $this->large = new SplPriorityQueue();
    }
  
    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum($num) 
    {
        if ($this->even) {
            $this->large->insert($num, $num);
            $large = $this->large->extract();
            $this->small->insert($large, -$large);
        } else {
            $this->small->insert($num, -$num);
            $small = $this->small->extract();
            $this->large->insert($small, $small);
        }
        $this->even = !$this->even;
    }
  
    /**
     * @return Float
     */
    function findMedian() 
    {
        if ($this->even) {
            return ($this->small->top() + $this->large->top()) / 2;
        } else {
            return $this->small->top();
        }
    }
}

/**
 * Your MedianFinder object will be instantiated and called as such:
 * $obj = MedianFinder();
 * $obj->addNum($num);
 * $ret_2 = $obj->findMedian();
 */
