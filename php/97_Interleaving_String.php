<?php

class Solution 
{

    /**
     * @param String $s1
     * @param String $s2
     * @param String $s3
     * @return Boolean
     */
    function isInterleave($s1, $s2, $s3) 
    {
        if (strlen($s1) + strlen($s2) != strlen($s3)) {
            return false;
        }
	if (strlen($s1) < strlen($s2)) {
            $this->swap($s1, $s2);
        }
        
	$m = strlen($s1);
        $n = strlen($s2);
			
        $dp = array_fill(0, $n + 1, false);
        $dp[0] = true;
        for ($j = 1; $j <= $n; $j++) {
            $dp[$j] = $s3[$j - 1] == $s2[$j - 1] && $dp[$j - 1];
        }

        for ($i = 1; $i <= $m; $i++) {
            $dp[0] = $s3[$i - 1] == $s1[$i - 1] && $dp[0];
            for ($j = 1; $j <= $n; $j++) {
                $dp[$j] = ($s3[$i + $j - 1] == $s1[$i - 1] && $dp[$j]);
                $dp[$j] = $dp[$j] || ($s3[$i + $j - 1] == $s2[$j - 1] && $dp[$j - 1]);
            }
        }
        return end($dp);
    }

    protected function swap(&$a, &$b) 
    {
        list($a, $b) = [$b, $a];
    }

}

