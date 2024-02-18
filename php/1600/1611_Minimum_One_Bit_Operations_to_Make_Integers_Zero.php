<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function minimumOneBitOperations($n) 
    {
        if ($n == 0) {
            return 0;
        }
        
        $k = 0;
        $curr = 1;
        while ($curr * 2 <= $n) {
            $curr *= 2;
            $k++;
        }
        
        return (1 << ($k + 1)) - 1 - $this->minimumOneBitOperations($n ^ $curr);
    }
}

