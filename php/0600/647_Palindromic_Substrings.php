<?php

class Solution 
{

    /**
     * @param String $s
     * @return Integer
     */
    function countSubstrings($s) 
    {
        $n = strlen($s);
        $dp = array_fill(0, $n, array_fill(0, $n, false));
        $count = 0;

        for ($i = $n - 1; $i >= 0; $i--) {
            for ($j = $i; $j < $n; $j++) {

                if ($i == $j) {
                    $dp[$i][$j] = true;
                } else if ($j == $i + 1) {
                 
                    $dp[$i][$j] = ($s[$i] == $s[$j]);
                } else {
                  
                    $dp[$i][$j] = ($s[$i] == $s[$j]) && $dp[$i + 1][$j - 1];
                }

              
                if ($dp[$i][$j]) {
                    $count++;
                }
            }
        }

        return $count;
    }
}

