<?php

class Solution 
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t) 
    {
        $lenS = strlen($s);
        $lenT = strlen($t);
        if ($s == $t) {
            return $t; 
        } elseif (empty($s) || empty($t) || $lenS < $lenT) { 
            return ''; 
        } 

        $result = '';
        $have = $need = [];
        $left = $right = $match = 0;
        for ($i = 0; $i < $lenT; $i++) {
            $need[$t[$i]]++; 
        } 
        $needMatch = count($need); 
        $min = PHP_INT_MAX;
        while ($right < $lenS) {
            $rStr = $s[$right]; 
            if (isset($have[$rStr])) { 
                $have[$rStr]++; 
            } else { 
                $have[$rStr] = 1; 
            } 
            if ($have[$rStr] == $need[$rStr]) { 
                $match++;
            }

            while ($match >= $needMatch) {
                $resLen = $right - $left + 1; 
                if ($resLen < $min) { 
                    $min = $resLen; 
                    $result = substr($s, $left, $min); 
                } 
                $lStr = $s[$left];
                $have[$lStr]--;
                if ($have[$lStr] == $need[$lStr] - 1) {
                    $match--; 
                } 
                $left++;
            }

            $right++;
        }
        return $result;
    }
}
