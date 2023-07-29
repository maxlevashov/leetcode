<?php

class Solution {

    protected $dp = [];

    /**
     * @param Integer $n
     * @return Float
     */
    function soupServings($n) {
        $m = ceil($n / 25.0);

        for ($k = 1; $k <= $m; $k++) {
            if ($this->calculateDP($k, $k) > 1 - 1e-5) {
                return 1;
            }
        }
        return $this->calculateDP($m, $m);
    }

    protected function calculateDP (int $i, int $j): float {
        if ($i <= 0 && $j <= 0) {
            return 0.5;
        }
        if ($i <= 0) {
            return 1.0;
        }
        if ($j <= 0) {
            return 0;
        }
        if ($this->dp[$i][$j]) {
            return $this->dp[$i][$j];
        }
        return $this->dp[$i][$j] = (
            $this->calculateDP($i - 4, $j) 
            + $this->calculateDP($i - 3, $j - 1)
            + $this->calculateDP($i - 2, $j - 2) 
            + $this->calculateDP($i - 1, $j - 3)
        ) / 4;
    }
}

