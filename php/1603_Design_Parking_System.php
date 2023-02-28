<?php

class ParkingSystem
{

    protected $cars = [];

    /**
     * @param Integer $big
     * @param Integer $medium
     * @param Integer $small
     */
    function __construct($big, $medium, $small)
    {
        $this->cars[1] = $big;
        $this->cars[2] = $medium;
        $this->cars[3] = $small;
    }

    /**
     * @param Integer $carType
     * @return Boolean
     */
    function addCar($carType)
    {
        $result = false;

        if ($this->cars[$carType]-- > 0) {
            $result = true;
        }

        return $result;
    }

}

/**
 * Your ParkingSystem object will be instantiated and called as such:
 * $obj = ParkingSystem($big, $medium, $small);
 * $ret_1 = $obj->addCar($carType);
 */

