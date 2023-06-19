<?php

class Solution 
{

    /**
     * @param Integer[] $gain
     * @return Integer
     */
    function largestAltitude($gain) 
    {
        $result = 0;
        $current = 0;

        foreach ($gain as $item) {
            $current += $item;
            $result = max($current, $result);
        }

        return $result;
    }
}

