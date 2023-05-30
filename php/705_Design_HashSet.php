<?php

class MyHashSet 
{
    
    protected $set;

    /**
     */
    function __construct() 
    {
        $this->set = [];
    }
  
    /**
     * @param Integer $key
     * @return NULL
     */
    function add($key) 
    {
        $this->set[$key] = true;
    }
  
    /**
     * @param Integer $key
     * @return NULL
     */
    function remove($key) 
    {
        unset($this->set[$key]);
    }
  
    /**
     * @param Integer $key
     * @return Boolean
     */
    function contains($key) 
    {
        return isset($this->set[$key]);
    }
}

/**
 * Your MyHashSet object will be instantiated and called as such:
 * $obj = MyHashSet();
 * $obj->add($key);
 * $obj->remove($key);
 * $ret_3 = $obj->contains($key);
 */

