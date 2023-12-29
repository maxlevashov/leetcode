<?php

class Solution 
{

    /**
     * @param Integer[] $jobDifficulty
     * @param Integer $d
     * @return Integer
     */
    function minDifficulty($jobDifficulty, $d) 
    {
        $jobs = count($jobDifficulty);
        if ($jobs < $d) {
            return -1;
        }
        $dp = array_fill(0, $d, array_fill(0, $jobs, 0));
        $dp[0][0] = $jobDifficulty[0];
        for ($i = 1; $i < $jobs; $i++) {
            $dp[0][$i] = max($dp[0][$i - 1], $jobDifficulty[$i]);
        }

        for ($days = 1; $days < $d; $days++) {
            for ($i = $days; $i < $jobs; $i++) {
                $localMax = $jobDifficulty[$i];
                $dp[$days][$i] = PHP_INT_MAX; 

                for ($j = $i; $j >= $days; $j--) {
                    $localMax = max($localMax, $jobDifficulty[$j]);
                    $dp[$days][$i] = min(
                        $dp[$days][$i], 
                        $dp[$days - 1][$j - 1] + $localMax
                    );
                }
            }
        }

        return $dp[$d - 1][$jobs - 1];
    }
}

