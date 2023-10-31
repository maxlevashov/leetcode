<?php

class Solution 
{

    /**
     * @param Integer[] $pref
     * @return Integer[]
     */
    function findArray($pref) 
    {
        $result[] = $pref[0];
        
        for ($i = 1; $i < count($pref); $i++) {
            $result[] = $pref[$i] ^ $pref[$i - 1];
        }

        return $result;
    }
}

