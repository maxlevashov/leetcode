<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function largestVariance($s) 
    {
        $counter = array_fill(0, 26, 0);
        for ($i = 0; $i < strlen($s); $i++) {
            $counter[ord($s[$i]) - ord('a')]++;
        }
        $globalMax = 0;
        
        for ($i = 0; $i < 26; $i++) {
            for ($j = 0; $j < 26; $j++) {
                if ($i == $j || $counter[$i] === 0 || $counter[$j] === 0) {
                    continue;
                }
                     
                $major = chr(ord('a') + $i);
                $minor = chr(ord('a') + $j);
                $majorCount = 0;
                $minorCount = 0;
            
                $restMinor = $counter[$j];
                
                for ($k = 0; $k < strlen($s); $k++) {   
                    if ($s[$k] == $major) {
                        $majorCount++;
                    }
                    if ($s[$k] == $minor) {
                        $minorCount++;
                        $restMinor--;
                    }
                    
                    if ($minorCount > 0) {
                        $globalMax = max($globalMax, $majorCount - $minorCount);
                    }

                    if ($majorCount < $minorCount && $restMinor > 0) {
                        $majorCount = 0;
                        $minorCount = 0;
                    }
                }
            }
        }
        
        return $globalMax;
    }
}

