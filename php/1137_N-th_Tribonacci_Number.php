<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function tribonacci($n)
    {
        if ($n == 0 || $n == 1) {
            return $n;
        }
        if ($n == 2) {
            return 1;
        }
        if (!isset($this->memo[$n])) {
            $this->memo[$n] = $this->tribonacci($n - 1)
                    + $this->tribonacci($n - 2) + $this->tribonacci($n - 3);
        }

        return $this->memo[$n];
    }

}
