<?php

class Solution 
{

    /**
     * @param Integer[] $days
     * @param Integer[] $costs
     * @return Integer
     */
    function mincostTickets($days, $costs) 
    {
        $travel = [];
        foreach ($days as $day) {
            $travel[$day] = false;
        }
        $dp = array_fill(0, 366, 0);
        
        for ($i = 1; $i < 366; ++$i) {
            if (!isset($travel[$i])) {
                $dp[$i] = $dp[$i - 1];
            } else {
                $dp[$i] = min( 
                    $dp[$i - 1] + $costs[0], 
                    $dp[max(0, $i - 7)] + $costs[1], 
                    $dp[max(0, $i - 30)] + $costs[2])
                ;
            }
        }

        return $dp[365];
    }
}

