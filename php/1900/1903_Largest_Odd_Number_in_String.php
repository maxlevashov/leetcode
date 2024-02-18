<?php

class Solution 
{

    /**
     * @param String $num
     * @return String
     */
    function largestOddNumber($num) 
    {
        $result = '';
        for ($i = strlen($num) - 1; $i >= 0; $i--) {
            if (intval($num[$i]) % 2 == 1) {
                $result = $i > 0 
                    ? substr($num, 0, $i + 1)
                    : $num[$i];
                break;
            }
        }

        return $result;
    }
}

