<?php

class Solution 
{

    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s) 
    {
        sort($g);
        sort($s);
        $contentChildren = 0;
        $cookieIndex = 0;

        while ($cookieIndex < count($s) && $contentChildren < count($g)) {
            if ($s[$cookieIndex] >= $g[$contentChildren]) {
                $contentChildren++;
            }
            $cookieIndex++;
        }
        
        return $contentChildren;
    }
}

