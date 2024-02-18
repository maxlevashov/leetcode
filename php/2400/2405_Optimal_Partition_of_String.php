<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function partitionString($s) 
    {
        $map = [];
        $result = [];
        $subArray = [];

        for ($i = 0; $i < strlen($s); $i++) 
        {
            if ($map[ord($s[$i])] == 0) {
                $subArray[] = $s[$i];
                $map[ord($s[$i])]++;
            } else {
                $result[] = $subArray;
                $subArray = [];
                $map = [];
                $subArray[] = $s[$i];
                $map[ord($s[$i])]++;
            }
            
        }
        $result[] = $subArray;

        return count($result);
    }
}

