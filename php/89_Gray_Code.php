<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function grayCode($n) 
    {
        $result = [0];
    
        for ($i = 0; $i < $n; $i++) {
            $resultCount = count($result);
            for ($j = $resultCount - 1; $j >= 0; $j--) {
                $result[] = $result[$j] | 1 << $i;
            }
                
        }

        return $result;
    }
}
