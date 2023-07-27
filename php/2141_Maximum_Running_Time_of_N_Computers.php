<?php

class Solution 
{

    /**
     * @param Integer $n
     * @param Integer[] $batteries
     * @return Integer
     */
    function maxRunTime($n, $batteries) 
    {
        $sumPower = 0;
        foreach ($batteries as $power) {
            $sumPower += $power;
        }
        $left = 1;
        $right = intval($sumPower / $n);
        
        while ($left < $right) {
            $target = $right - intval(($right - $left) / 2);
            $extra = 0;
            
            foreach ($batteries as $power) {
                $extra += min($power, $target);
            }

            if ($extra >= ($n * $target)) {
                $left = $target;
            } else {
                $right = $target - 1;
            }
        }

        return $left;
    }
}

