<?php

class Solution 
{

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) 
    {
        $result = array_fill(0, $rowIndex + 1, 0);
        $result[0] = $result[$rowIndex] = 1;

        for ($i = 1; $i < $rowIndex; $i++) {
            $result[$i] = intval($result[$i - 1] 
                * ($rowIndex - $i + 1) / $i);
        }

        return $result;
    }
}

