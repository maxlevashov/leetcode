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
        $szToGroup = array_fill(0, count($groupSizes) + 1, []);

        for ($i = 0; $i < count($groupSizes); $i++) {
            $szToGroup[$groupSizes[$i]][] = $i;
            if (count($szToGroup[$groupSizes[$i]]) == $groupSizes[$i]) {
                $result[] = $szToGroup[$groupSizes[$i]];
                $szToGroup[$groupSizes[$i]] = [];
            }
        }
        
        return $result;
    }
}

