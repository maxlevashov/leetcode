<?php

class Solution 
{

    public $prime2index = [];
    public $index2prime = [];

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canTraverseAllPairs($nums) 
    {
        for ($i = 0; $i < count($nums); $i++) {
            $temp = $nums[$i];
            for ($j = 2; $j * $j <= $nums[$i]; $j++) {
                if ($temp % $j == 0) {
                    $this->prime2index[$j][] = $i;
                    $this->index2prime[$i][] = $j;
                    while ($temp  % $j == 0) {
                        $temp  /= $j;
                    }
                }
            }
            if ($temp  > 1) {
                $this->prime2index[$temp][] = $i;
                $this->index2prime[$i][] = $temp;
            }
        }

        $visitedIndex = array_fill(0, count($nums), 0);
        $visitedPrime = [];
        $this->dfs(0, $visitedIndex, $visitedPrime);     

        for ($i = 0; $i < count($visitedIndex); $i++) {
            if ($visitedIndex[$i] == false) { 
                return false;
            }
        }
        return true;  
    }

    protected function dfs(int $index, &$visitedIndex, &$visitedPrime) 
    {
        if ($visitedIndex[$index] == true) {
            return;
        }
        $visitedIndex[$index] = true;

        foreach ($this->index2prime[$index] as &$prime) {
            if ($visitedPrime[$prime] == true) { 
                continue;
            }
            $visitedPrime[$prime] = true;
            foreach ($this->prime2index[$prime] as  &$index1) {
                if ($visitedIndex[$index1] == true) {
                    continue;
                }
                $this->dfs($index1, $visitedIndex, $visitedPrime);
            }
        }
    }
}


