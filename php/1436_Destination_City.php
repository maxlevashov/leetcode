<?php

class Solution 
{

    /**
     * @param String[][] $paths
     * @return String
     */
    function destCity($paths) 
    {
        $hasOutgoing = [];
        for ($i = 0; $i < count($paths); $i++) {
            $hasOutgoing[$paths[$i][0]] = true;
        }
        
        for ($i = 0; $i < count($paths); $i++) {
            $candidate = $paths[$i][1];
            if (!isset($hasOutgoing[$candidate])) {
                return $candidate;
            }
        }
        
        return "";
    }
}

