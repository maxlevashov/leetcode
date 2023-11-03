<?php

class Solution 
{

    /**
     * @param Integer[] $target
     * @param Integer $n
     * @return String[]
     */
    function buildArray($target, $n) 
    {
        $result = [];
        $i = 0;
        
        foreach ($target as $num) {
            while ($i < $num - 1) {
                $result[] = 'Push';
                $result[] = 'Pop';
                $i++;
            }
            
            $result[] = 'Push';
            $i++;
        }
        
        return $result;
    }
}

