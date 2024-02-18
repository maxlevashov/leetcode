<?php

class Solution {


    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function isScramble($s1, $s2) {
        if (strlen($s1) != strlen($s2)) {
            return false;
        }
        
	$len = strlen($s1);
	$memo = [];
        
	for ($k = 1; $k <= $len; ++$k) {
            for ($i = 0; $i + $k <= $len; ++$i) {
		for ($j = 0; $j + $k <= $len; ++$j) {
                    if ($k == 1) {
			$memo[$i][$j][$k] = $s1[$i] == $s2[$j];
                    } else {
                        for ($q = 1; $q < $k && !$memo[$i][$j][$k]; ++$q) {
                            $memo[$i][$j][$k] = ($memo[$i][$j][$q] && $memo[$i + $q][$j + $q][$k - $q]) 
                                || ($memo[$i][$j + $k - $q][$q] && $memo[$i + $q][$j][$k - $q]);
                        }
                    }
                }
            }
        }

	return $memo[0][0][$len];
    }
}

