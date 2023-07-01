<?php

class Solution 
{

    /**
     * @param Integer[] $cookies
     * @param Integer $k
     * @return Integer
     */
    function distributeCookies($cookies, $k) 
    {
        $distribute = [];
        
        return $this->dfs(0, $distribute, $cookies, $k, $k);
    }

    /**
     * 
     * @param int $i
     * @param array $distribute
     * @param array $cookies
     * @param int $k
     * @param int $zeroCount
     * @return int
     */
    protected function dfs(
        int $i, 
        array $distribute, 
        array $cookies, 
        int $k, 
        int $zeroCount
    ): int {

        if (count($cookies) - $i < $zeroCount) {
            return PHP_INT_MAX;   
        }

        if ($i == count($cookies)) {
            $unfairness = PHP_INT_MIN;
            foreach ($distribute as $value) {
                $unfairness = max($unfairness, $value);
            }
            return $unfairness;
        }
        
        $answer = PHP_INT_MAX;
        for ($j = 0; $j < $k; ++$j) {
            $zeroCount -= $distribute[$j] == 0 ? 1 : 0;
            $distribute[$j] += $cookies[$i];
            
            $answer = min(
                $answer, 
                $this->dfs($i + 1, $distribute, $cookies, $k, $zeroCount)
            );
            
            $distribute[$j] -= $cookies[$i];
            $zeroCount += $distribute[$j] == 0 ? 1 : 0;
        }
        
        return $answer;
    }
}

