<?php

class Solution 
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function addDigits($num) 
    {
        $result = 0;
        
        while (true) {
            $numString = strval($num);
            $len = strlen($numString);
            if ($len <= 1) {
                break;
            }
            for ($i = 0; $i < strlen($numString); $i++) {
                $result += $numString[$i];            
            }
            $num = $result;
            $result = 0;
        }

        return $num;
    }
}
