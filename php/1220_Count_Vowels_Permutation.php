<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function countVowelPermutation($n) 
    {
        $mod = 1e9 + 7;
        $a = 1;
        $e = 1;
        $i = 1;
        $o = 1;
        $u = 1;
        
        for ($j = 1; $j < $n; $j++) {
            $a_next = $e;
            $e_next = ($a + $i) % $mod;
            $i_next = ($a + $e + $o + $u) % $mod;
            $o_next = ($i + $u) % $mod;
            $u_next = $a;
            
            $a = $a_next;
            $e = $e_next;
            $i = $i_next;
            $o = $o_next;
            $u = $u_next;
        }
        
        return ($a + $e + $i + $o + $u) % $mod;
    }
}

