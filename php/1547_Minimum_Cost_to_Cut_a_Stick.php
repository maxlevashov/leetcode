<?php

class Solution 
{

    protected  $memo = [];

    /**
     * @param Integer $n
     * @param Integer[] $cuts
     * @return Integer
     */
    function minCost($n, $cuts) 
    {
        $cuts[] = 0;
        $cuts[] = $n;
        sort($cuts);
        return $this->dfs($cuts, 0, count($cuts) - 1);
    }

    protected function dfs(array &$cuts, int $i, int $j) 
    {
        if ($j - $i <= 1) {
            return 0;
        }

        if (!$this->memo[$i][$j]) {
            $this->memo[$i][$j] = PHP_INT_MAX;
            for ($k = $i + 1; $k < $j; ++$k) {
                $this->memo[$i][$j] = min($this->memo[$i][$j], 
                    $cuts[$j] - $cuts[$i] + $this->dfs($cuts, $i, $k) 
                        + $this->dfs($cuts, $k, $j));
            }
        }

        return $this->memo[$i][$j];
    }
}
