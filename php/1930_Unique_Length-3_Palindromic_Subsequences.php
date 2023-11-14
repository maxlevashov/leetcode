<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function countPalindromicSubsequence($s) 
    {
        $letters = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $letters[$s[$i]] = true;
        }
        
        $result = 0;
        foreach ($letters as $letter => $value) {
            $i = -1;
            $j = 0;
            
            for ($k = 0; $k < strlen($s); $k++) {
                if ($s[$k] == $letter) {
                    if ($i == -1) {
                        $i = $k;
                    }
                    
                    $j = $k;
                }
            }
            
            $between = [];
            for ($k = $i + 1; $k < $j; $k++) {
                $between[$s[$k]] = true;
            }
            
            $result += count($between);
        }
        
        return $result;
    }
}
