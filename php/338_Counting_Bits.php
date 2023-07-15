<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function countBits($n) 
    {
        $result = array_fill(0, $n + 1, 0);

        for ($i = 1; $i <= $n; ++$i) {
            $result[$i] = $result[$i & ($i - 1)] + 1;
        }

        return $result;
    }
}

