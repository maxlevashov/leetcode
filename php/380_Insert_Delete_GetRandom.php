<?php

class RandomizedSet 
{

    protected $set = [];
    /**
     */
    function __construct() 
    {
        
    }
  
    /**
     * @param Integer $val
     * @return Boolean
     */
    function insert($val) {
        if (!empty($this->set[$val])) 
        {
            return false;
        }

        $this->set[$val] = true;

        return true;
    }
  
    /**
     * @param Integer $val
     * @return Boolean
     */
    function remove($val) {
        if (empty($this->set[$val])) 
        {
            return false;
        }
        unset($this->set[$val]);
        return true;
    }
  
    /**
     * @return Integer
     */
    function getRandom() 
    {
        return array_rand($this->set);
    }
}

/**
 * Your RandomizedSet object will be instantiated and called as such:
 * $obj = RandomizedSet();
 * $ret_1 = $obj->insert($val);
 * $ret_2 = $obj->remove($val);
 * $ret_3 = $obj->getRandom();
 */

