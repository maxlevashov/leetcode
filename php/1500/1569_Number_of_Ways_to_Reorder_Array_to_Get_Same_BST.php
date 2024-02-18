<?php

class Solution 
{

    protected $table = [];
    protected $mod = 10 ** 9 + 7;

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numOfWays($nums) 
    {
        $m = count($nums);

        for ($i = 0; $i < $m + 1; ++$i) {
            $this->table[$i][0] = $this->table[$i][$i] = 1;
        }

        for ($i = 2; $i < $m; ++$i) {
            for ($j = 1; $j < $i; ++$j) {
                $this->table[$i][$j] = ($this->table[$i - 1][$j - 1] + $this->table[$i - 1][$j])
                    % $this->mod;
            }
        }
        
        return ($this->dfs($nums) - 1) % $this->mod;
    }

    /**
     * 
     * @param type $nums
     * @return int
     */
    protected function dfs(&$nums): int
    {
        $m = count($nums);
        if ($m < 3) {
            return 1;
        }

        $leftNodes = [];
        $rightNodes = [];
        for ($i = 1; $i < $m; ++$i) {
            if ($nums[$i] < $nums[0]) {
                $leftNodes[] = $nums[$i];
            } else {
                $rightNodes[] = $nums[$i];
            }
        }
		
        $leftWays = $this->dfs($leftNodes) % $this->mod;
        $rightWays = $this->dfs($rightNodes) % $this->mod;
		
        return ((($leftWays * $rightWays) % $this->mod) * $this->table[$m - 1][count($leftNodes)])
            % $this->mod;
    }
}

