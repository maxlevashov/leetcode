<?php

class Solution 
{

    const MOD = 1000000007;

    protected $memo = [];

    /**
     * @param Integer $n
     * @return Integer
     */
    function countOrders($n) 
    {
        if ($n == 1) {
		    return 1;
        }
        if (isset($this->memo[$n])) {
            return $this->memo[$n];
        }

        $this->memo[$n] = ($this->countOrders($n - 1) * (2 * $n - 1) * $n) % self::MOD;

        return $this->memo[$n];
    }
}

