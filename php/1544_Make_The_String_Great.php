<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function makeGood($s) {
        if (strlen($s) <= 1) {
            return $s;
        }
        $newS = '';
        $sLen = strlen($s);
        $isContinue = false;
        for ($i = 0; $i < $sLen; $i++) {
            if ($isContinue) {
                $isContinue = false;
                continue;
            }
            
            if (!empty($s[$i]) && !empty($s[$i + 1])) {
               if (
                   $s[$i] != $s[$i + 1]
                   && strtolower($s[$i]) == strtolower($s[$i + 1])
               ) {
                   $isContinue = true;
                   continue;
               }
            }
            $newS .= $s[$i];    
        } 
        var_dump($newS);
        return strlen($s) != strlen($newS) ? $this->makeGood($newS) : $s;
    }
}
