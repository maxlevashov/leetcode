<?php

class Solution 
{

    /**
     * @param String $s
     * @return String
     */
    function removeStars($s) 
    {
        $result = '';
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '*') {
                $result = substr($result, 0, -1);
            } else {
                $result .= $s[$i];
            }
            
        }
        return $result;
    }
}

