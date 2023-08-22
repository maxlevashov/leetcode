<?php

class Solution 
{

    /**
     * @param Integer $columnNumber
     * @return String
     */
    function convertToTitle($columnNumber) 
    {
        $result = '';
        
        while ($columnNumber--) {
            $result = $result . chr (($columnNumber) % 26 + ord('A'));
            $columnNumber = intval($columnNumber / 26);
        }
        $result = strrev($result);

        return $result;
    }
}

