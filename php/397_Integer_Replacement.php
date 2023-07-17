<?php

class Solution 
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function integerReplacement($n) 
    {
        if ($n == 1) {
            return 0;
        }
        if (isset($this->dp[$n])) {
            return $dp[$n];
        }
        if ($n % 2 == 0) {
            return $dp[$n] = 1 + $this->integerReplacement($n / 2);
        }

        return $dp[$n] = min(
            1 + $this->integerReplacement($n + 1),
            1 + $this->integerReplacement($n - 1)
        );
    }
}

