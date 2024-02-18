<?php

class Solution 
{

    /**
     * @param String $num
     * @return String
     */
    function largestGoodInteger($num) 
    {
        $result = -1;
        for ($i = 0; $i < strlen($num); $i++) {
            if (isset($num[$i + 1]) 
                && isset($num[$i + 2])
                && $num[$i] == $num[$i + 1] 
                && $num[$i + 2] == $num[$i]
                && $num[$i] > $result
            ) {
                $result = $num[$i];
            }
        }

        return $result == -1 
            ? '' 
            : $result . $result . $result;
    }
}

