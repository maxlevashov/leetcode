<?php

class Solution 
{
    protected int $mod = 10 ** 9 + 7;
    
    /**
     * @param Integer $n
     * @param Integer $k
     * @param Integer $target
     * @return Integer
     */
    function numRollsToTarget($n, $k, $target) 
    {
        $dp = array_fill(0, $n + 1, array_fill(0, $target + 1, -1)); 

        return $this->recursion($dp, $n, $k, $target); 
    }

    protected function recursion(&$dp, int $n, int $k, int $target) 
    {
        if ($target == 0 && $n == 0) {
            return 1;
        }
        if ($n == 0 || $target <= 0) {
            return 0;
        }
        if ($dp[$n][$target] != -1) {
            return $dp[$n][$target] % $this->mod;
        }

        $ways = 0; 
        for ($i = 1; $i <= $k; $i++) {
            $ways = ($ways + $this->recursion(
                $dp, $n - 1, $k, $target - $i
                )
            ) % $this->mod;
        }
        $dp[$n][$target] = $ways % $this->mod; 
        return $dp[$n][$target];
    }
}

