<?php

class Solution 
{

    /**
     * @param Integer[] $ratings
     * @return Integer
     */
    function candy($ratings) 
    {
        $size = count($ratings);
        if ($size <= 1) {
            return $size;
        }
        $memo = array_fill(0, $size, 1);
        
        for ($i = 1; $i < $size; $i++) {
            if ($ratings[$i] > $ratings[$i - 1]) {
                $memo[$i] = $memo[$i - 1] + 1;
            }
        }
        for ($i = $size - 1; $i > 0; $i--) {
            if ($ratings[$i - 1] > $ratings[$i]) {
                $memo[$i - 1] = max($memo[$i] + 1, $memo[$i - 1]);
            }
        }
        $result = 0;
        for ($i = 0; $i < $size; $i++) {
            $result += $memo[$i];
        }

        return $result;
    }
}

