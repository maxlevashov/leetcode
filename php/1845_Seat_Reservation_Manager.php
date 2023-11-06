<?php

class SeatManager 
{
    protected $seats;
    
    /**
     * @param Integer $n
     */
    function __construct($n) 
    {
        $this->seats = new  SplPriorityQueue();
        for ($i = 1; $i <= $n; $i++) {
            $this->seats->insert($i, -$i);
        }
    }
  
    /**
     * @return Integer
     */
    function reserve() 
    {
        return $this->seats->extract();
    }
  
    /**
     * @param Integer $seatNumber
     * @return NULL
     */
    function unreserve($seatNumber) 
    {
        $this->seats->insert($seatNumber, -$seatNumber);
    }
}

/**
 * Your SeatManager object will be instantiated and called as such:
 * $obj = SeatManager($n);
 * $ret_1 = $obj->reserve();
 * $obj->unreserve($seatNumber);
 */

