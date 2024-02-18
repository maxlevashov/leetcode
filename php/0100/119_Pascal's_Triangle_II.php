<?php

class Solution 
{

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) 
    {
        $result = [];
        $factor = 1;

        for ($i = 0; $i <= $rowIndex; $i++) {
            $result[] = $factor;
            $factor = intval($factor * ($rowIndex - $i) / ($i + 1));
        }

        return $result;
    }
}

