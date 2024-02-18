<?php

class Solution 
{

    /**
     * @param String $s
     * @param String $goal
     * @return Boolean
     */
    function buddyStrings($s, $goal) 
    {
        $lenString = strlen($s);
        if ($lenString != strlen($goal)) {
            return false;
        }

        if ($s == $goal) {
            $frequency = array_fill(0, 26, 0);
            for ($i = 0; $i < $lenString; ++$i) {
                $frequency[ord($s[$i]) - ord('a')] += 1;
                if ($frequency[ord($s[$i]) - ord('a')] == 2) {
                    return true;
                }
            }

            return false;
        }
        
        $firstIndex = -1;
        $secondIndex = -1;

        for ($i = 0; $i < $lenString; ++$i) {
            if ($s[$i] != $goal[$i]) {
                if ($firstIndex == -1) {
                    $firstIndex = $i;
                } elseif ($secondIndex == -1) {
                    $secondIndex = $i;
                } else {
                    return false;
                }
            }
        }

        if ($secondIndex == -1) {
            return false;
        }
        
        return $s[$firstIndex] == $goal[$secondIndex] && 
            $s[$secondIndex] == $goal[$firstIndex];
    }
}

