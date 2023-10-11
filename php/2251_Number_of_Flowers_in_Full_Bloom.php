<?php

class Solution 
{

    /**
     * @param Integer[][] $flowers
     * @param Integer[] $people
     * @return Integer[]
     */
    function fullBloomFlowers($flowers, $people) 
    {
        $n = count($flowers);
        $start = [];
        $end = [];
        for ($i = 0; $i < $n; $i++) {
            $start[$i] = $flowers[$i][0];
            $end[$i] = $flowers[$i][1];
        }
        sort($start);
        sort($end);
        $result = [];
        
        for ($i = 0; $i < count($people); $i++) {
            $current = $people[$i];
            $started = $this->binarySearchUpperBound($start, $current);
            $ended = $this->binarySearchLowerBound($end, $current);
            $result[$i] = $started - $ended;
        }
        
        return $result;
    }

    protected function binarySearchUpperBound($flowers, int $target) 
    {
        $left = 0;
        $right = count($flowers);
        
        while ($left < $right) {
            $mid = intval(($right + $left) / 2);
            if ($flowers[$mid] <= $target) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        
        return $left;
    }
    
    protected function binarySearchLowerBound($flowers, int $target) 
    {
        $left = 0;
        $right = count($flowers);
        
        while ($left < $right) {
            $mid = intval(($right + $left) / 2);
            if ($flowers[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        
        return $left;
    }
}

