<?php

class Solution {

    const ABSOLUTE_NULL = 273.15;

    const MELTING_POINT_ICE = 32;

    const FAHR_FACTOR = 1.8;

    /**
     * @param Float $celsius
     * @return Float[]
     */
    function convertTemperature($celsius) {
        return [
            $celsius + self::ABSOLUTE_NULL, 
            $celsius * self::FAHR_FACTOR + self::MELTING_POINT_ICE
        ];
    }
}

