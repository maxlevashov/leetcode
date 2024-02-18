<?php

class Solution 
{

    protected $dp = [];

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer
     */
    function makeArrayIncreasing($arr1, $arr2) 
    {
        sort($arr2);
        
        $answer = $this->dfs(0, -1, $arr1, $arr2);
        
        return $answer < 2001 ? $answer : -1;
    }
    
    /**
     * 
     * @param int $i
     * @param int $prev
     * @param array $arr1
     * @param array $arr2
     * @return int
     */
    private function dfs(int $i, int $prev,  array $arr1,  array $arr2): int
    {
        if ($i == count($arr1)) {
            return 0;
        }
        if (isset($this->dp[implode([$i, $prev])])) {
            return $this->dp[implode([$i, $prev])];
        }

        $cost = 2001;

        if ($arr1[$i] > $prev) {
            $cost = $this->dfs($i + 1, $arr1[$i], $arr1, $arr2);
        }

        $idx = $this->bisectRight($arr2, $prev);

        if ($idx < count($arr2)) {
            $cost = min($cost, 1 + $this->dfs($i + 1, $arr2[$idx], $arr1, $arr2));
        }

        $this->dp[implode([$i, $prev])] = $cost;

        return $cost;
    }

    /**
     * 
     * @param array $arr
     * @param int $value
     * @return int
     */
    private function bisectRight(array $arr, int $value): int 
    {
        $left = 0;
        $right = count($arr);

        while ($left < $right) {
            $mid = intval(($left + $right) / 2);
            if ($arr[$mid] <= $value) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }

        return $left;
    } 
}

