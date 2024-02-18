<?php

class Solution 
{

    /**
     * @param Integer[] $groupSizes
     * @return Integer[][]
     */
    function groupThePeople($groupSizes) 
    {
        $result = [];
        $sizeToGroup = array_fill(0, count($groupSizes) + 1, []);

        for ($i = 0; $i < count($groupSizes); $i++) {
            $sizeToGroup[$groupSizes[$i]][] = $i;
            if (count($sizeToGroup[$groupSizes[$i]]) == $groupSizes[$i]) {
                $result[] = $sizeToGroup[$groupSizes[$i]];
                $sizeToGroup[$groupSizes[$i]] = [];
            }
        }
        
        return $result;
    }
}

