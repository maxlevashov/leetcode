<?php

class UndergroundSystem 
{

    protected $checkInStation = [];
    protected $checkOutStation = [];

    /**
     */
    function __construct() {
        
    }
  
    /**
     * @param Integer $id
     * @param String $stationName
     * @param Integer $t
     * @return NULL
     */
    function checkIn($id, $stationName, $t) 
    {
        $this->checkInStation[$id] = [$stationName, $t];
    }
  
    /**
     * @param Integer $id
     * @param String $stationName
     * @param Integer $t
     * @return NULL
     */
    function checkOut($id, $stationName, $t) 
    {
        $currentCheckIn = $this->checkInStation[$id];
        unset($this->checkInStation[$id]);

        $route = $currentCheckIn[0] . "_" . $stationName;

        $this->checkOutStation[$route][0] += $t - $currentCheckIn[1];
        $this->checkOutStation[$route][1] += 1;  
    }
  
    /**
     * @param String $startStation
     * @param String $endStation
     * @return Float
     */
    function getAverageTime($startStation, $endStation) 
    {
        $route  = $startStation . "_" . $endStation;
        $time = $this->checkOutStation[$route];

        return $time[0] / $time[1];
    }
}

/**
 * Your UndergroundSystem object will be instantiated and called as such:
 * $obj = UndergroundSystem();
 * $obj->checkIn($id, $stationName, $t);
 * $obj->checkOut($id, $stationName, $t);
 * $ret_3 = $obj->getAverageTime($startStation, $endStation);
 */

